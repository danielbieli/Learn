<?php
get_header();
?>

   <div class="container content">
 
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
  	
   	<div class="row">
        <div class="col-md-12">
          <h2><?php the_title(); ?></h2>   
          
          <?php if ( has_post_thumbnail() )   
			echo '<div class="category_thumbnail">'. get_the_post_thumbnail(null,'thumbnail') . '</div>'; 
		 ?>
                
         <?php the_excerpt(); ?>
         <a href="<?php the_permalink();?>">weiterlesen</a>
        </div>
        
      </div>
      
<?php endwhile; ?>
<?php endif; ?>     


<?php
get_footer();
?>
