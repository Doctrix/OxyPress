<?php

/**
* Evenements planifies http://localhost/wp-cron.php link par defaut
*/

/*
add_action('oxy_import_content', function() {
	touch(__DIR__ . '/events-cron-' . time());
});
add_filter('cron_schedules', function ($schedules) {
	$schedules['ten_seconds'] = [
		'interval' => 10,
		'display' => __('Toutes les 10 secondes', 'oxy')
	];
	return $schedules;
});

/* dedug
if ($timestamp = wp_next_scheduled('oxy_import_content')) {
	wp_unschedule_event($timestamp, 'oxy_import_content');
}

echo '<pre>';
var_dump(_get_cron_array());
echo'</pre>';
die();

if (!wp_next_scheduled('oxy_import_content')) {
	wp_schedule_event(time(), 'ten_seconds', 'oxy_import_content');
}
*/