<?php
/**
 * PHPUnit Bootstrap
 *
 * To run these tests:
 * 	1. Install Composer (https://getcomposer.org/)
 *  2. Install plugin development dependencies (`composer install`)
 *  3. Install WordPress unit tests library (`bin/install-wp-tests.sh`)
 *  4. Run `./vendor/bin/phpunit` from the root directory of this plugin
 */

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../bu-versions.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

function _load_post_types(){
	register_post_type( '1suuuuperlongpostype', array( 'show_ui' => true ) );
	register_post_type( '2suuuuperlongpostype', array( 'show_ui' => true ) );
	register_post_type( '2suuuuperlongp' );
}
tests_add_filter( 'init', '_load_post_types' );

require $_tests_dir . '/includes/bootstrap.php';

