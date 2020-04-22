<?php
   class npc_script_parser
   {
      private $content;
      private $new_content;
      private $name;
      private $race;
      private $sex;
      private $posx;
      private $posy;
      private $posz;
      private $direction;
      private $head_trigger;
      private $head_answer;
      private $error_msg;

   	const S = '[\t ]*';
		const COMPARE = '[=<>~!]+';
		const NAME = '[a-z]+';
		const FULLNAME = '[^(^)]+';
		const NUMBER = '[-]*[0-9]+';
		const FUNC = '.+';
		const CALC = '[+-=]';
		const EOL = "\r\n";
		const PARSER_ERROR = 'ERROR_1';

      public function __construct( $content = '' )
      {
         $this->content = $content;
      }

      public function parse()
      {
         $script_lines = preg_split( "/\n\r|\r|\n/", $this->content );
         foreach( $script_lines as $line_nr=>$line )
         {
            $current_line = $this->parse_line( $line );
            if ( $current_line == self::PARSER_ERROR )
            {
               $this->error_msg = "<b>Parser Error</b>\nMessage: Invalid Input\nLine: ".($line_nr+1)."\nAt: ".$this->error_msg;
               $this->new_content = self::PARSER_ERROR;
               return null;
            }
            $this->new_content .= $current_line;
         }
      }

      public function print_script()
      {
         if ( $this->new_content == self::PARSER_ERROR )
         {
            $this->write_log( 'Parser Error' );
            return $this->error_msg;
         }
         $this->write_log( 'Script OK' );
         return $this->print_header().
                $this->new_content.
                $this->print_footer();
      }

      private function write_log( $message )
      {
         $file = '/home/nitram/logs/parserlog.log';
         $filecursor = fopen( $file, 'a' );
         $ip_sep = explode( '.', $_SERVER['REMOTE_ADDR'] );
	      fwrite( $filecursor, $_SERVER['REMOTE_ADDR'].' - '.sprintf( '%02x%02x%02x%02x', $ip_sep[0], $ip_sep[1], $ip_sep[2], $ip_sep[3] ).' - '.$message."\n" );
	      fclose( $filecursor );
      }

      private function print_header()
      {
         return '-- INSERT INTO npc VALUES (nextval(\'npc_seq\'),'.$this->race.','.$this->posx.','.$this->posy.','.$this->posz.','.$this->direction.',false,\''.$this->name.'\',\'npc_'.strtolower( str_replace( ' ', '_', $this->name ) ).'.lua\','.$this->sex.');'.self::EOL.
                self::EOL.
                'dofile("npc_autonpcfunctions.lua");'.self::EOL.
                ''.self::EOL.
                'function useNPC(user,counter,param)'.self::EOL.
                '    thisNPC:increaseSkill(1,"common language",100);'.self::EOL.
                '    thisNPC:talkLanguage(CCharacter.say, CPlayer.german, "Finger weg!");'.self::EOL.
                '    thisNPC:talkLanguage(CCharacter.say, CPlayer.english, "Don\'t you touch me!");'.self::EOL.
                'end'.self::EOL.
                self::EOL.
                'function initializeNpc()'.self::EOL.
                '    if TraderFirst then'.self::EOL.
                '        return true;'.self::EOL.
                '    end'.self::EOL.
                self::EOL.
                '    InitTalkLists();'.self::EOL.
                self::EOL.
                '    -- ********* START DYNAMIC PART ********'.self::EOL.
                self::EOL.
                '    ';
      }

      private function print_footer()
      {
         return '-- ********* END DYNAMIC PART ********'.self::EOL.
                '    TradSpeakLang={0,1};'.self::EOL.
                '    TradStdLang=0;'.self::EOL.
                self::EOL.
                '    increaseLangSkill(TradSpeakLang);'.self::EOL.
                '    thisNPC.activeLanguage=TradStdLang;'.self::EOL.
                self::EOL.
                'end'.self::EOL.
                self::EOL.
                'function nextCycle()  -- ~10 times per second'.self::EOL.
                '    initializeNpc();'.self::EOL.
                '    SpeakerCycle();'.self::EOL.
                'end'.self::EOL.
                self::EOL.
                'function receiveText(texttype, message, originator)'.self::EOL.
                '    if BasicNPCChecks(originator,2) then'.self::EOL.
                '        if LangOK(originator,TradSpeakLang) then'.self::EOL.
                '            TellSmallTalk(message,originator);'.self::EOL.
                '        else'.self::EOL.
                '            Confused('.self::EOL.
                '               "#me sieht dich leicht verwirrt an",'.self::EOL.
                '               "#me looks at you a little confused"'.self::EOL.
                '            );'.self::EOL.
                '        end'.self::EOL.
                '    end'.self::EOL.
                'end'.self::EOL;
      }

      private function parse_line( $line )
      {
         $line = str_replace( '*', '\*', $line );
         $return = '';
         if ( strlen( $line ) < 2 )
         {
            return '';
         }
         elseif ( preg_match( '/^[-][-].*/', $line ) )
         {
            $return = '-- '.preg_replace( '/.*[-][-]'.self::S.'(.+).*/', '$1', $line ).self::EOL.'    ';
         }
         elseif ( preg_match( '/[-][>]/', $line ) )
         {
            list( $conditions, $consequences ) = explode( '->', $line );
            $parsed_line = $this->parse_conditions( $conditions );
            if ( $parsed_line == self::PARSER_ERROR )
            {
               return self::PARSER_ERROR;
            }
            $parsed_cons = $this->parse_consequences( $consequences );
            if ( $parsed_cons == self::PARSER_ERROR )
            {
               return self::PARSER_ERROR;
            }
            $parsed_line.=$parsed_cons;
            $return = 'AddTraderTrigger("'.$this->head_trigger.'","'.$this->head_answer.'");'.self::EOL.'    '.$parsed_line;
            $this->head_trigger = '';
            $this->head_answer = '';
         }
         elseif ( preg_match( '/name'.self::S.'='.self::S.'"'.self::FULLNAME.'"/', $line ) )
         {
            $this->name = preg_replace( '/.*name'.self::S.'='.self::S.'"('.self::FULLNAME.')".*/', '$1', $line );
         }
         elseif ( preg_match( '/race'.self::S.'='.self::S.self::NAME.'/i', $line ) )
         {
            $this->race = preg_replace( '/.*race'.self::S.'='.self::S.'('.self::NAME.').*/i', '$1', $line );
            switch ( strtolower( $this->race ) )
            {
               case 'human':     $this->race = 0; break;
               case 'dwarf':     $this->race = 1; break;
               case 'halfling':  $this->race = 2; break;
               case 'elf':       $this->race = 3; break;
               case 'orc':       $this->race = 4; break;
               case 'lizardman': $this->race = 5; break;
               case 'lizard':    $this->race = 5; break;
               case 'gnome':     $this->race = 6; break;
               case 'fairy':     $this->race = 7; break;
               case 'goblin':    $this->race = 8; break;
               default:
                  $this->error_msg = $line;
                  return self::PARSER_ERROR;
               break;
            }
         }
         elseif ( preg_match( '/sex'.self::S.'='.self::S.self::NAME.'/i', $line ) )
         {
            $this->sex = preg_replace( '/sex'.self::S.'='.self::S.'('.self::NAME.')/i', '$1', $line );
            switch ( strtolower( substr( $this->sex, 0, 1 ) ) )
            {
               case 'm': $this->sex = 0; break;
               case 'f': $this->sex = 1; break;
               case 'n': $this->sex = 2; break;
               default:
                  $this->error_msg = $line;
                  return self::PARSER_ERROR;
               break;
            }
         }
         elseif ( preg_match( '/dir[^=]*='.self::S.self::NAME.'/i', $line ) )
         {
            $this->direction = preg_replace( '/.*dir[^=]*='.self::S.'('.self::NAME.').*/i', '$1', $line );
            switch ( strtolower( trim( $this->direction ) ) )
            {
               case 'north': $this->direction = 0; break;
               case 'northeast': $this->direction = 1; break;
               case 'east': $this->direction = 2; break;
               case 'southeast': $this->direction = 3; break;
               case 'south': $this->direction = 4; break;
               case 'southwest': $this->direction = 5; break;
               case 'west': $this->direction = 6; break;
               case 'northwest': $this->direction = 7; break;
               default:
                  $this->error_msg = $line;
                  return self::PARSER_ERROR;
               break;
            }
         }
         elseif ( preg_match( '/position'.self::S.'='.self::S.self::NUMBER.self::S.','.self::S.self::NUMBER.self::S.','.self::S.self::NUMBER.'/', $line ) )
         {
            list( $this->posx, $this->posy, $this->posz ) = explode( '|', preg_replace( '/.*position'.self::S.'='.self::S.'('.self::NUMBER.')'.self::S.','.self::S.'('.self::NUMBER.')'.self::S.','.self::S.'('.self::NUMBER.').*/', '$1|$2|$3', $line ) );
         }
         elseif ( preg_match( '/cycletext'.self::S.'"'.self::FUNC.'"'.self::S.','.self::S.'"'.self::FUNC.'"/', $line ) )
         {
            $return = 'AddCycleText("'.preg_replace( '/.*cycletext'.self::S.'"('.self::FUNC.')"'.self::S.','.self::S.'"('.self::FUNC.')".*/', '$1","$2', $line ).'");'.self::EOL.'    ';
         }
         elseif ( preg_match( '/questid'.self::S.self::COMPARE.self::S.self::NUMBER.'/i', $line ) )
         {
            $return = 'QuestID = '.preg_replace( '/.*questid'.self::S.self::COMPARE.self::S.'('.self::NUMBER.').*/i', '$1', $line ).';'.self::EOL.'    ';
         }
         elseif ( preg_match( '/radius'.self::S.self::COMPARE.self::S.self::NUMBER.'/i', $line ) )
         {
            $return = 'SetRadius('.preg_replace( '/.*radius'.self::S.self::COMPARE.self::S.'('.self::NUMBER.').*/i', '$1', $line ).');'.self::EOL.'    ';
         }
         else
         {
            $this->error_msg = $line;
            return self::PARSER_ERROR;
         }
         return str_replace( '\*', '*', $return );
      }

      private function parse_conditions( $conditions )
      {
         $conditions = $this->split_input( $conditions );
         $parsed_output = "";
         foreach ( $conditions as $condition )
         {
            if ( preg_match( '/".*"/', $condition ) )
            {
               if ( strlen( $this->head_trigger ) < 2 )
               {
                  $this->head_trigger = preg_replace( '/.*"(.*)".*/', '$1', $condition );
               }
               else
               {
                  $parsed_output.= 'AddAdditionalTrigger('.preg_replace( '/.*"(.*)".*/', '"$1"', $condition ).');'.self::EOL;
               }
               continue;
            }
            elseif ( preg_match( '/state'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("state",'.preg_replace_callback( '/.*state'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/skill'.self::S.'\('.self::S.self::FULLNAME.self::S.'\)'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("skill",'.preg_replace_callback( '/.*skill'.self::S.'\('.self::S.'('.self::FULLNAME.')'.self::S.'\)'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/attrib'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("attrib",'.preg_replace_callback( '/.*attrib'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/rune'.self::S.'\('.self::S.self::NAME.self::S.','.self::S.self::NUMBER.self::S.'\)/', $condition ) )
            {
               $parsed_output.= 'AddCondition("rune",'.preg_replace_callback( '/.*rune'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.','.self::S.'('.self::NUMBER.')'.self::S.'\).*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/money'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("money",'.preg_replace_callback( '/.*money'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/race'.self::S.'='.self::S.self::NAME.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("race", CCharacter.'.preg_replace( '/.*race'.self::S.'='.self::S.'('.self::NAME.').*/', '$1', $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/queststatus'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("qpg",'.preg_replace_callback( '/.*queststatus'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/item'.self::S.'\('.self::S.self::NUMBER.self::S.','.self::S.self::NAME.self::S.'\)'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("item",'.preg_replace_callback( '/.*item'.self::S.'\('.self::S.'('.self::NUMBER.')'.self::S.','.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
			}
			elseif ( preg_match( '/town'.self::S.self::COMPARE.self::S.self::NAME.'/', $condition ) )
			{
			   $parsed_output.= 'AddCondition("town",'.preg_replace_callback( '/.*town'.self::S.'('.self::COMPARE.')'.self::S.'('.self::NAME.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
			continue;
			}
			elseif ( preg_match( '/rank'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::COMPARE.self::S.self::NUMBER.'/', $condition ) )
			{
			   $parsed_output.= 'AddCondition("rank",'.preg_replace_callback( '/.*rank'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::COMPARE.')'.self::S.'('.self::NUMBER.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
			   continue;
			}
            elseif ( preg_match( '/german/', $condition ) )
            {
               $parsed_output.= 'AddCondition("lang","german");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/english/', $condition ) )
            {
               $parsed_output.= 'AddCondition("lang","english");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/chance'.self::S.'\('.self::S.self::FUNC.self::S.'\)/', $condition ) )
            {
               $parsed_output.= 'AddCondition("chance",'.preg_replace_callback( '/chance'.self::S.'\('.self::S.'('.self::FUNC.')'.self::S.'\)/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/female/', $condition ) )
            {
               $parsed_output.= 'AddCondition("sex","female");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/male/', $condition ) )
            {
               $parsed_output.= 'AddCondition("sex","male");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/busy/', $condition ) )
            {
               $parsed_output.= 'AddCondition("idlestate","busy");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/idle/', $condition ) )
            {
               $parsed_output.= 'AddCondition("idlestate","idle");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/fraction'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("fraction",'.preg_replace_callback( '/fraction'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.')/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/%self::NUMBER'.self::S.self::COMPARE.self::S.self::FUNC.'/', $condition ) )
            {
               $parsed_output.= 'AddCondition("number",'.preg_replace_callback( '/.*%self::NUMBER'.self::S.'('.self::COMPARE.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $condition ).');'.self::EOL;
               continue;
            }
            else
            {
               $this->error_msg = $condition;
               return PARSER_ERROR;
            }
         }
         $parsed_output = preg_replace( '/"([0-9]+)"/', '$1', $parsed_output );
         $parsed_output = str_replace( self::EOL, self::EOL.'    ', $parsed_output );
         return $parsed_output;
      }

      private function parse_consequences( $consequences )
      {
         $consequences = $this->split_input( $consequences );
         $parsed_output = "";
         foreach ( $consequences as $consequence )
         {
            if ( preg_match( '/".*"/', $consequence ) )
            {
               $consequence = preg_replace( '/.*"(.*)".*/', '$1', $consequence );
               $consequence = str_replace( '%NPCself::NAME', '"..thisNPC.name.."', $consequence );
               if ( strlen( $this->head_answer ) < 2 )
               {
                  $this->head_answer = $consequence;
               }
               else
               {
                  $parsed_output.= 'AddAdditionalText("'.$consequence.'");'.self::EOL;
               }
               continue;
            }
            elseif ( preg_match( '/state'.self::S.self::CALC.self::S.self::FUNC.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("state",'.preg_replace_callback( '/.*state'.self::S.'('.self::CALC.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/skill'.self::S.'\('.self::S.self::FULLNAME.self::S.','.self::S.'[a-z ]+'.self::S.'\)'.self::S.self::CALC.self::S.self::FUNC.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("skill",'.preg_replace_callback( '/.*skill'.self::S.'\('.self::S.'('.self::FULLNAME.')'.self::S.','.self::S.'([a-z ]+)'.self::S.'\)'.self::S.'('.self::CALC.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/attrib'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::CALC.self::S.self::FUNC.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("attrib",'.preg_replace_callback( '/.*skill'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::CALC.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/rune'.self::S.'\('.self::S.self::NAME.self::S.','.self::S.self::NUMBER.self::S.'\)/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("rune",'.preg_replace_callback( '/.*rune'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.','.self::S.'('.self::NUMBER.')'.self::S.'\).*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/money'.self::S.self::CALC.self::S.self::FUNC.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("money",'.preg_replace_callback( '/.*money'.self::S.'('.self::CALC.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/deleteitem'.self::S.'\('.self::S.self::NUMBER.self::S.','.self::S.self::FUNC.self::S.'\)/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("deleteitem",'.preg_replace_callback( '/.*deleteitem'.self::S.'\('.self::S.'('.self::NUMBER.')'.self::S.','.self::S.'('.self::FUNC.')'.self::S.'\).*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/item'.self::S.'\('.self::S.self::NUMBER.self::S.','.self::S.self::FUNC.self::S.','.self::S.self::FUNC.self::S.','.self::S.self::FUNC.self::S.'\)/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("item",'.preg_replace_callback( '/.*item'.self::S.'\('.self::S.'('.self::NUMBER.')'.self::S.','.self::S.'('.self::FUNC.')'.self::S.','.self::S.'('.self::FUNC.')'.self::S.','.self::S.'('.self::FUNC.')'.self::S.'\).*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/queststatus'.self::S.self::CALC.self::S.self::FUNC.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("qpg",'.preg_replace_callback( '/.*queststatus'.self::S.'('.self::CALC.')'.self::S.'('.self::FUNC.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/fraction'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::CALC.self::S.self::NUMBER.'/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("fraction",'.preg_replace_callback( '/.*fraction'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::CALC.')'.self::S.'('.self::NUMBER.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
               continue;
				}
				elseif ( preg_match( '/rank'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::CALC.self::S.self::NUMBER.'/', $consequence ) )
				{
					$parsed_output.= 'AddConsequence("rank",'.preg_replace_callback( '/.*rank'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::CALC.')'.self::S.'('.self::NUMBER.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
					continue;
				}
				elseif ( preg_match( '/rankpoints'.self::S.'\('.self::S.self::NAME.self::S.'\)'.self::S.self::CALC.self::S.self::NUMBER.'/', $consequence ) )
				{
					$parsed_output.= 'AddConsequence("rankpoints",'.preg_replace_callback( '/.*rankpoints'.self::S.'\('.self::S.'('.self::NAME.')'.self::S.'\)'.self::S.'('.self::CALC.')'.self::S.'('.self::NUMBER.').*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
					continue;
				}
            elseif ( preg_match( '/begin/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("talk","begin");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/end/', $consequence ) )
            {
               $parsed_output.= 'AddConsequence("talk","end");'.self::EOL;
               continue;
            }
            elseif ( preg_match( '/inform'.self::S.'\('.self::S.self::FULLNAME.self::S.'\)/', $consequence ) )
            {
                $parsed_output.= 'AddConsequence("inform",'.preg_replace_callback( '/.*inform'.self::S.'\('.self::S.'('.self::FULLNAME.')'.self::S.'\).*/', array( $this, "parse_function" ), $consequence ).');'.self::EOL;
                continue;
            }
            else
            {
               $this->error_msg = $consequence;
               return PARSER_ERROR;
            }
         }
         $parsed_output = preg_replace( '/"([0-9]+)"/', '$1', $parsed_output );
         $parsed_output = str_replace( self::EOL, self::EOL.'    ', $parsed_output );
         return $parsed_output;
      }

      private function parse_function( $return_values )
      {
         $return = array();
         unset( $return_values[0] );
         foreach ( $return_values as $value )
         {
            if ( preg_match( '/^expr'.self::S.'\('.self::S.'.+'.self::S.'\)'.self::S.'$/', $value ) )
            {
               $term = preg_replace( '/expr'.self::S.'\('.self::S.'(.+)'.self::S.'\)/', '$1', $value );
               $term = str_replace( '%self::NUMBER', 'a', $term );
               $return[] = 'function( a ) return '.$term.'; end';
            }
            elseif ( preg_match( '/^'.self::S.self::COMPARE.self::S.'$/', $value ) )
            {
               $return[] = '"'.preg_replace( '/'.self::S.'('.self::COMPARE.')'.self::S.'/', '$1', $value ).'"';
            }
            elseif ( preg_match( '/^'.self::S.self::NUMBER.self::S.'$/', $value ) )
            {
               $return[] = '"'.preg_replace( '/'.self::S.'('.self::NUMBER.')'.self::S.'/', '$1', $value ).'"';
            }
            elseif ( preg_match( '/^'.self::S.self::NAME.self::S.'$/', $value ) )
            {
               $return[] = '"'.preg_replace( '/'.self::S.'('.self::NAME.')'.self::S.'/', '$1', $value ).'"';
            }
            elseif ( preg_match( '/^'.self::S.self::FULLNAME.self::S.'$/', $value ) )
            {
               $return[] = '"'.trim(preg_replace( '/'.self::S.'('.self::FULLNAME.')'.self::S.'/', '$1', $value )).'"';
            }
            elseif ( preg_match( '/^'.self::S.self::CALC.self::S.'$/', $value ) )
            {
               $return[] = '"'.preg_replace( '/'.self::S.'('.self::CALC.')'.self::S.'/', '$1', $value ).'"';
            }
            elseif ( preg_match( '/^'.self::S.'%NUMBER'.self::S.'$/', $value ) )
            {
               $return[] = '"%NUMBER"';
            }
         }
         return implode( ',', $return );
      }

      private function split_input( $input )
      {
         $result = array();
         while( preg_match( '/"[^,^"]*,[^"]*"/', $input ) )
         {
            $input = preg_replace( '/"([^,^"]*),([^"]*)"/', '"$1&comma;$2"', $input );
         } // while
         $input = preg_replace( '/"'.self::S.'&comma;'.self::S.'"/', '","', $input );

         while( preg_match( '/\([^,^)]*,[^)]*\)/', $input ) )
         {
            $input = preg_replace( '/\(([^,^)]*),([^)]*)\)/', '($1&comma;$2)', $input );
         } // while

         $input = preg_split( '/'.self::S.','.self::S.'/', $input );
         foreach ( $input as $value )
         {
            $result[] = str_replace( '&comma;', ',', $value );
         }
         return $result;
      }
   }
?>