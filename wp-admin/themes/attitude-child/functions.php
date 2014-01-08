<?php

// Remove old copyright text
add_action( 'init' , 'pr_remove_copy' , 15 );
function pr_remove_copy() {
        remove_action( 'attitude_footer', 'attitude_footer_info', 30 );
}

// Add my own copyright text
add_action( 'attitude_footer' , 'pr_footer_info' , 30 );
function pr_footer_info() {
   $output = '<div class="copyright">'.'Copyright &copy;[the-year] [site-link] '.'</div><!-- .copyright -->';
   echo do_shortcode( $output );
}