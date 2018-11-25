<?php
/*
Template Name: Mit Anfahrtsskizze
*/
get_header();
?>

   <div class="container content">
 
 
<?php  the_post(); ?>
  	
   	<div class="row">
        <div class="col-md-12">
          <h1><?php the_title(); ?></h1>
         <?php the_content(); ?>
        </div> 
        
 	 <div class="col-md-12">
        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=15.423326790332792%2C47.0699208688532%2C15.42550206184387%2C47.07132571098256&amp;layer=mapnik&amp;marker=47.07062238112517%2C15.42441576719284" style="border: 1px solid black"></iframe><br/><small><a href="http://www.openstreetmap.org/?mlat=47.07062&amp;mlon=15.42442#map=19/47.07062/15.42441">Größere Karte anzeigen</a></small>
     </div>
     
    </div>

<?php
get_footer();
?>