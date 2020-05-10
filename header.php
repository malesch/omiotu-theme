<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300&amp;subset=latin-ext' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>	  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/lib/html5shiv.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/lib/respond.min.js"></script>
    <![endif]-->
    <meta name="description" content="<?php bloginfo('description'); ?>">

		
  </head>
  <body <?php body_class(); ?>>
  <nav class="navbar navbar-fixed-top navbar-white" role="navigation">
  <div class="container">
    <div class="row">
    <div class="col-xs-5 col-md-3 ">
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
            </a>
    <span class="write-me"><a href="mailto:<?php echo get_option('admin_email'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/letter.png" alt="<?php echo get_option('admin_email'); ?>" >   
           </a></span>
     <span class="navbar-brand-text">      
          omiotu<span class="tomi">(tOmi&nbsp;scheiderbauer)</span>.com</span>
    </div>
    <div class="col-xs-3 col-md-1"><div class="search">
   <?php echo do_shortcode( '[wp_live_search placeholder="search..." compact="true" dropdown="true" results_style="inside"]' );?>
    </div></div>
    <div class="col-xs-2 col-md-1">
    <button type="button" class="btn btn-default btn-my" data-toggle="modal" data-target="#emailsubscribe">
  subscribe...
</button>
<a href="https://www.facebook.com/tscheiderbauer" target="_blank" class="fb"><img src="<?php echo get_template_directory_uri(); ?>/img/fbicon.png" alt="FB" />   
           </a>
    </div>
  
    
    </div><!--row -->
    </div><!--container -->
</nav>





