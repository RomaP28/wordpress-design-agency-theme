<?php

function footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'footer_menu' );
