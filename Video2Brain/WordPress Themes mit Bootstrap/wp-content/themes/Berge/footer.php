 <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>
        <?php
        $options = get_option('berge_theme_options');
        ?>	
        <?=$options['copyright']; ?>	
        	<?php bloginfo('description');?> <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/bootstrap/js/docs.min.js"></script>
    
    <script>
    	$(document).ready(function() {

			// Alle Formularbuttons sollen schön aussehen
			$("#submit").addClass('btn btn-default btn-large');
			
		});
    </script>
<?php wp_footer();d ?>
  </body>
</html>
