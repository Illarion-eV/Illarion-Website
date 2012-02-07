<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/database.php';

	if (!defined( 'TODAY_TIME' ))
	{
		define( 'TODAY_TIME', date('Y-m-d') );
		define( 'TODAY_TIMESTAMP', mktime(0,0,0,date('m'),date('d'),date('Y') ) );
	}

	$pgSQL =& Database::getPostgreSQL();

	// Connect informations needed for the statistic
	$query = 'SELECT MAX("acc_id")'
	.PHP_EOL.' FROM "accounts"."account"'
	.PHP_EOL.' WHERE "acc_registerdate" <= '.$pgSQL->Quote( date('Y-m-d', TODAY_TIMESTAMP-(60*60*24*28)) )
		;
	$pgSQL->setQuery( $query );
	$allowed_accid = $pgSQL->loadResult();

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM "accounts"."account"'
	.PHP_EOL.' WHERE "acc_registerdate" < '.$pgSQL->Quote( TODAY_TIME )
	.PHP_EOL.' AND "acc_registerdate" > '.$pgSQL->Quote( date('Y-m-d', TODAY_TIMESTAMP-(60*60*24)) )
	;
	$pgSQL->setQuery( $query );
	$new_accounts = $pgSQL->loadResult();

	$query = 'SELECT DISTINCT "chr_accid"'
	.PHP_EOL.' FROM "illarionserver"."chars"'
	.PHP_EOL.' WHERE "chr_accid" <= '.$pgSQL->Quote( $allowed_accid )
	.PHP_EOL.' AND "chr_lastsavetime" >= '.$pgSQL->Quote( TODAY_TIMESTAMP-(60*60*24*14) )
	.PHP_EOL.' AND "chr_status" = 0'
	;
	$pgSQL->setQuery( $query );
	$active_accounts = $pgSQL->loadResultArray();

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM "illarionserver"."chars"'
	.PHP_EOL.' WHERE "chr_accid" <= '.$pgSQL->Quote( $allowed_accid )
	.PHP_EOL.' AND "chr_lastsavetime" >= '.$pgSQL->Quote( TODAY_TIMESTAMP-(60*60*24*14) )
	.PHP_EOL.' AND "chr_status" = 0'
	;
	$pgSQL->setQuery( $query );
	$active_chars = $pgSQL->loadResult();

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM "accounts"."account"'
	.PHP_EOL.' WHERE "acc_lang" = 0'
	.PHP_EOL.' AND "acc_id" IN ('.implode(',',$active_accounts).')'
	;
	$pgSQL->setQuery( $query );
	$german_players = $pgSQL->loadResult();

	// Write all statistic data to the database

	$query = 'INSERT INTO homepage.statistics (stat_date, stat_active_accounts, stat_new_accounts, stat_active_chars, stat_german)'
	.PHP_EOL.' VALUES ('.$pgSQL->Quote( TODAY_TIME ).','.$pgSQL->Quote( count($active_accounts) ).','.$pgSQL->Quote( $new_accounts ).','.$pgSQL->Quote( $active_chars ).','.$pgSQL->Quote( $german_players ).')'
	;
	$pgSQL->setQuery($query);
	$pgSQL->query();

	$query = 'DELETE FROM homepage.storage'
    .PHP_EOL.' WHERE s_key = '.$pgSQL->Quote('newbie_accid')
    ;
    $pgSQL->setQuery( $query );
    $pgSQL->query();

    $query = 'INSERT INTO homepage.storage ( s_key,s_value )'
    .PHP_EOL.' VALUES ('.$pgSQL->Quote('newbie_accid').', '.$pgSQL->Quote( $allowed_accid ).')'
    ;
    $pgSQL->setQuery( $query );
    $pgSQL->query();

	
	echo '<h1>Active players statistics</h1>';
	echo '<ul>';
	echo '<li>Date: '.TODAY_TIME.'</li>';
	echo '<li>Active Accounts: '.count( $active_accounts ).'</li>';
	echo '<li>New Accounts: '.$new_accounts.'</li>';
	echo '<li>Active Chars: '.$active_chars.'</li>';
	echo '<li>German Players: '.$german_players.'</li>';
	echo '<li style="font-size:xx-small;">Active Account List: '.implode(', ',$active_accounts)."</li>";
	echo '</ul>';
?>
