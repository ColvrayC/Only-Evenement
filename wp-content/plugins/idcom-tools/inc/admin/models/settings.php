<?php

global $wp;

global $wpdb;

$pages = wpm_get_wp_pages_for_setting();

/**
 * Include view
 */
include IDCOMSPABOOKER_ROOT_PATH.'/inc/admin/views/settings.php';