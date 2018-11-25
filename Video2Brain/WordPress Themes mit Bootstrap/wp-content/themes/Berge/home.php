<?php
get_header();
?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
      	
<?php
$i=0;  
$posts = get_posts( 'category=1,2' ); 	
foreach ( $posts as $post ) : setup_postdata( $post );
?>     	
        <div class="item <?php if($i==0) echo 'active';?>">
  
           <?php if ( has_post_thumbnail() ){
           		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
           	?>
			<img  src="<?=$thumbnail[0];?>" alt="Generic placeholder image">
			<?php } ?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php the_title();?></h1>
              <p><?php the_excerpt();?></p>
              <p><a class="btn btn-lg btn-primary" href="<?php the_permalink();?>" role="button">weiterlesen</a></p>
            </div>
          </div>
        </div>
       
<?php
 $i++;
endforeach; 
wp_reset_postdata();
?>     
     
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
<?php  
$posts = get_posts( 'category=1' ); 	
foreach ( $posts as $post ) : setup_postdata( $post );
?>      	
        <div class="col-lg-4">
           <?php if ( has_post_thumbnail() ){ $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');?>
			<img class="img-circle" src="<?=$thumbnail[0];?>" alt="Generic placeholder image">
			<?php } ?>
          <h2><?php the_title();?></h2>
          <p><?php the_excerpt();?></p>
          <p><a class="btn btn-default" href="<?php the_permalink();?>" role="button">weiterlesen &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
<?php
endforeach; 
wp_reset_postdata();
?>         
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">


<?php 
$i=0;
$posts = get_posts( 'category=2' ); 	
foreach ( $posts as $post ) : setup_postdata( $post );
	
	if($i%2 == 0){
?>
	

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php the_title();?></h2>
          <p class="lead"><?php the_excerpt(); ?><a href="<?php the_permalink();?>">weiterlesen</a></p>         
        </div>
        <div class="col-md-5">          
        <?php if ( has_post_thumbnail() ){ $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), array(500,500));?>
			<img class="featurette-image img-responsive" src="<?=$thumbnail[0];?>" alt="Generic placeholder image">
		<?php } ?>
		</div>
      </div>
      <hr class="featurette-divider">
<?php }else{ ?>
      <div class="row featurette">
        <div class="col-md-5">
           <?php if ( has_post_thumbnail() ){ $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), array(500,500));?>
			<img class="featurette-image img-responsive" src="<?=$thumbnail[0];?>" alt="Generic placeholder image">
		<?php } ?>
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading"><?php the_title();?></h2>
          <p class="lead"><?php the_excerpt(); ?><a href="<?php the_permalink();?>">weiterlesen</a></p>         
        </div>
      </div>

      <hr class="featurette-divider">

<?php
}

 
$i++;
endforeach; 
wp_reset_postdata();
 ?>     
   
      

      <!-- /END THE FEATURETTES -->


<?php
	get_footer();
?>
