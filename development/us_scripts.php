<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/development/script_parser.php" );
   create_header( "Illarion - Scripteditor",
                  "This script editor offers the possibility to convert npc ".
                  "scripts into lua scripts.",
                  "scripts, npcs, own quests, npc, developing" );
   include_header();
?>

<h1>Scripteditor</h1>

<?php
if ( isset( $_POST['submit'] ) )
{
   echo "<h2>Results</h2>";
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

<h2>Script Editor</h2>

This script editor offers the possiblity to write own npc scripts

<p>
   <a href="<?php echo $url; ?>/development/us_scripts_comm.php">Script Commands</a>
</p>

<?php insert_go_to_top_link(); ?>

<h2>Upload Script file</h2>

<form action="de_scripts.php" method="post" enctype="multipart/form-data">
   <input type="file" name="script_file" /><br /><br />
   <input type="submit" name="submit" value="upload!" />
   <input type="hidden" name="no_opti" value="1" />
</form>

<?php insert_go_to_top_link(); ?>

<h2>Write Script File</h2>

<form action="de_scripts.php" method="post" enctype="multipart/form-data">
   <textarea name="script_text" rows="15" cols="200" style="width:100%;">
   </textarea><br /><br />
   <input type="submit" name="submit" value="upload!" />
   <input type="hidden" name="no_opti" value="1" />
</form>

<?php } insert_go_to_top_link(); ?>

<?php include_footer(); ?>