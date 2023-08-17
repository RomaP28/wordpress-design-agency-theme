<?php

function main_cases_menu() {
    register_nav_menu('main-cases-menu',__( 'Main Cases Menu' ));
}
add_action( 'init', 'main_cases_menu' );
