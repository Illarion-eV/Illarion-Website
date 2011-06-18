<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/development/script_parser.php" );
   create_header( "Illarion - Skripteditor",
                  "Dieser Skripteditor ermöglicht es die NPC Scripte in Lua ".
                  "Skripte zu convertieren.",
                  "Skripte, NPCs, eigene Quests, npc, programmieren" );
   include_header();
?>

<h1>Skripteditor</h1>

<?php
if ( isset( $_POST['submit'] ) )
{
   echo "<h2>Resultate</h2>";
   $filename = $_SERVER['DOCUMENT_ROOT']."/".rand( 100000, 999999 ).".npc";
   while( file_exists( $filename ) )
   {
      $filename = $_SERVER['DOCUMENT_ROOT']."/".rand( 100000, 999999 ).".npc";
   }

   if ( isset( $_FILES['script_file'] ) )
   {
      move_uploaded_file( $_FILES['script_file']['tmp_name'], $filename );
      $text = file_get_contents( $filename );
      unlink( $filename );
   }
   elseif ( isset( $_POST['script_text'] ) )
   {
      $text = stripslashes( $_POST['script_text'] );
   }

   $parser = new npc_script_parser( $text );
   $parser->parse();

   echo "<pre>";
   echo htmlspecialchars_decode( $parser->print_script() );
   echo "</pre>";
}
else
{
?>

<h2>Skripteditor</h2>

Dieser Skripteditor erm&ouml;glicht es die NPC-Scripte in Lua-Skripte zu konvertieren

<p>
   <a href="<?php echo $url; ?>/development/de_scripts_comm.php">Skriptbefehle</a>
</p>

<?php insert_go_to_top_link(); ?>

<h2>Skriptdatei hochladen</h2>

<form action="de_scripts.php" method="post" enctype="multipart/form-data">
   <input type="file" name="script_file" /><br /><br />
   <input type="submit" name="submit" value="absenden" />
   <input type="hidden" name="no_opti" value="1" />
</form>

<?php insert_go_to_top_link(); ?>

<h2>Skriptdatei schreiben</h2>

<form action="de_scripts.php" method="post" enctype="multipart/form-data">
   <textarea name="script_text" rows="15" cols="200" style="width:100%;">
   </textarea><br /><br />
   <input type="submit" name="submit" value="absenden" />
   <input type="hidden" name="no_opti" value="1" />
</form>

<?php } insert_go_to_top_link(); ?>

<?php include_footer(); ?>