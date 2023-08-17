<?php

function main_services_menu() {
    register_nav_menu('main-services-menu',__( 'Main Services Menu' ));
}
add_action( 'init', 'main_services_menu' );
