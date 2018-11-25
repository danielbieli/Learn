<?php
get_header();

$args_comment_form = array( 	
	'title_reply' => 'Hinterlassen Sie einen Kommentar',
	'comment_notes_before' => '<div style="margin-bottom:1em">Ihre E-Mail-Adresse wird nicht veröffentlicht. Notwendige Felder sind mit * markiert.</div>',
	'comment_notes_after' => '',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(	
	   	 'author' =>
	      	'<div class="form-group">
	      	<input id="author" name="author" class="form-control"  type="text" placeholder="Ihr Name *" value="' . esc_attr( $commenter['comment_author'] ) .
	      	'"' . $aria_req . ' /></div>',
	
	    	'email' =>
	      	'<div class="form-group">
	      	<input id="email" name="email" class="form-control"  type="text" placeholder="E-Mail-Adresse *" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      	'" ' . $aria_req . ' /></div>',
	
	    	'url' =>
	      	'<div class="form-group">' .
	      	'<input id="url" name="url" class="form-control"  placeholder="Webseite" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      	'" /></div>'
	    )
  ),
  'comment_field' =>  '<textarea id="comment" class="form-control" rows="9" name="comment" aria-required="true"></textarea><br/>',
    
 );
?>

   <div class="container content">
 
 
<?php  the_post(); ?>
  	
   	<div class="row">
        <div class="col-md-8">
          <h1><?php the_title(); ?></h1>
          <div class="meta">
          	 <?php the_date(); ?><br/>
          	Von <?php the_author_link();?>.<br/>
          	<?php the_tags('Das sind die Tags: ',' &bull; ');?><br/>
          	Kategorien:<?php the_category('&bull;');?>
          </div>
         <?php the_content(); ?>
         <?php comment_form( $args_comment_form ); ?>
         <?php comments_template(); ?>
        </div>
        
        <div class="col-md-4">
        	<?php get_sidebar(); ?>
		</div>
      </div>
      
  


<?php
get_footer();
?>
