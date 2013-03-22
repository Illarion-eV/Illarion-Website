<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Karte von Gobaith",
      "Die Insel Gobaith",
      "Map, Karte, Bilder, Grafik, Graphik",
      "",
      "",
      "prototype,wz_tooltip"
      );

   include_header();

?>

   <center><img width='80%' height='80%' src='map_of_gobaith.jpg' usemap='#map_of_gobaith'></center>

      <?php/*
         $img = @imagecreatefromjpeg("http://illarion.org/general/map_of_gobaith.jpg");


	   if ($img) {
	        $img_width = imagesx($img);
		     ImageDestroy($img);
		       }

		          echo "widht is " . $img_width;

			       */ ?>

      <map name="map_of_gobaith">
         <area shape="rect" coords="180,20,230,70"
            href="towns/nordmark.jpg" ONMOUSEOVER="Tip('Die Nordmark <br> <img src=\'towns/nordmark.jpg\' width=\'60\'>')" ONMOUSEOUT="UnTip()" alt="" title="">
      </map>


   

<?php include_footer(); ?>

