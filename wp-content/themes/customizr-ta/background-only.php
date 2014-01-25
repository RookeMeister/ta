<?php
/**
	Template Name: Page with background only

*/
?>
<html>
<head>

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