<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta name="viewpoint" content="width=device-eidth">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/normalize.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

<!--[if lt IE 9]>
<script src="dist/html5shiv.js"></script>
<![endif]-->
<?php wp_enqueue_script('jquery-latest.min', get_bloginfo('template_url') . '/js/jquery-latest.min.js'); ?>
<?php wp_enqueue_script('jquery-latest.min', get_bloginfo('template_url') . '/js/script.js'); ?>

<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53518375-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class(); ?>>
<header>

<div class="container">
<h1 id="title"><a href="<?php echo home_url(); ?> "><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" heiht="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt=""></a></h1>

<!--
<div id="subinfo">
<?php echo get_search_form(); ?>
</div>
-->

</div>

<nav>
<div class="container-800">
<?php wp_nav_menu('theme_location=navigation'); ?>
</div>
</nav>

</header>
 