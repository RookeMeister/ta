<?php
/**
	Template Name: Page with background only

*/
?>
<html>
<head>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<style type="text/css">
body { background-color: #cccccc; background-repeat: repeat-y; background-position: top center; background-attachment: scroll; }
#page-content { width: 640px; margin: 20px auto; }
#page-content p { font-size: 1em; font-family: Georgia; line-height: 1.5em; text-align: justify; }
</style>
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>

<body>
<?php while (have_posts()) : the_post(); ?>
<div id="entry-content">
	<?php the_content(); endwhile; ?>
</div>
</body>
</html>