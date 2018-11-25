<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title><?php wp_title( '|', true, 'right' ); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url');?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('template_url');?>/carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet">
<?php wp_head(); ?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
  	
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </div>
            <div class="navbar-collapse collapse">
              
             <?php
				// Navwalker auf https://github.com/twittem/wp-bootstrap-navwalker
				$defaults = array(
					'theme_location'  => 'primary',
					'container'       => false,
					'menu_class'      => 'nav navbar-nav',	
					'depth'           => 2,
					'walker'          => new wp_bootstrap_navwalker()
				);
				wp_nav_menu($defaults);
				?>    
                 
                 
   
            </div>
          </div>
        </div>


      </div>
    </div>
