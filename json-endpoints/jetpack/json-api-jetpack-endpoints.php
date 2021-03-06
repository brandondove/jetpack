<?php

$json_jetpack_endpoints_dir = dirname( __FILE__ ) . '/';

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-endpoint.php' );

// THEMES
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-endpoint.php' );
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-active-endpoint.php' );

new Jetpack_JSON_API_Themes_Active_Endpoint( array(
	'description'     => 'Get the active theme of your blog',
	'stat'            => 'themes:mine',
	'method'          => 'GET',
	'path'            => '/sites/%s/themes/mine',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/mine'
) );

new Jetpack_JSON_API_Themes_Active_Endpoint( array(
	'description'     => 'Change the active theme of your blog',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes/mine',
	'stat'            => 'themes:mine',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'query_parameters' => array(
		'context' => false
	),
	'request_format' => array(
		'theme'   => '(string) The ID of the theme that should be activated'
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'theme' => 'twentytwelve'
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/mine'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-list-endpoint.php' );

new Jetpack_JSON_API_Themes_List_Endpoint( array(
	'description'     => 'Get WordPress.com Themes allowed on your blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes',
	'method'          => 'GET',
	'path'            => '/sites/%s/themes',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'found'  => '(int) The total number of themes found.',
		'themes' => '(array) An array of theme objects.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-get-endpoint.php' );
new Jetpack_JSON_API_Themes_Get_Endpoint( array(
	'description'     => 'Get a single theme on a jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes:get:1',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes/%s',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$theme'  => '(string) The theme slug',
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/twentyfourteen'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-modify-endpoint.php' );
new Jetpack_JSON_API_Themes_Modify_Endpoint( array(
	'description'     => 'Modify a single theme on a jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes:modify:1',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes/%s',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$theme'  => '(string) The theme slug',
	),
	'request_format' => array(
		'action'       => '(string) Only possible value is \'update\'. More to follow.',
		'autoupdate'   => '(bool) Whether or not to automatically update the theme.',
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'action' => 'update',
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/twentyfourteen'
) );

new Jetpack_JSON_API_Themes_Modify_Endpoint( array(
	'description'     => 'Modify a list of themes on a jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes:modify',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
	),
	'request_format' => array(
		'action'       => '(string) Only possible value is \'update\'. More to follow.',
		'autoupdate'   => '(bool) Whether or not to automatically update the theme.',
		'themes'       => '(array) A list of theme slugs',
	),
	'response_format' => array(
		'themes' => '(array:theme) A list of theme objects',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'action' => 'autoupdate_on',
			'themes'     => array(
				'twentytwelve',
				'twentyfourteen',
			),
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-install-endpoint.php' );
// POST /sites/%s/themes/%s/install
new Jetpack_JSON_API_Themes_Install_Endpoint( array(
	'description'     => 'Install a theme to your jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes:1:install',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes/%s/install',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$theme' => '(int|string) The theme slug to install',
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/twentyfourteen/install'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-themes-delete-endpoint.php' );
// POST /sites/%s/themes/%s/delete
new Jetpack_JSON_API_Themes_Delete_Endpoint( array(
	'description'     => 'Delete/Uninstall a theme from your jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'themes:1:delete',
	'method'          => 'POST',
	'path'            => '/sites/%s/themes/%s/delete',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$theme'  => '(string) The slug of the theme to delete',
	),
	'response_format' => Jetpack_JSON_API_Themes_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/themes/twentyfourteen/delete'
) );


// PLUGINS

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-endpoint.php' );
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-get-endpoint.php' );
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-list-endpoint.php' );

new Jetpack_JSON_API_Plugins_List_Endpoint( array(
	'description'     => 'Get installed Plugins on your blog',
	'method'          => 'GET',
	'path'            => '/sites/%s/plugins',
	'stat'            => 'plugins',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'plugins' => '(array) An array of plugin objects.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins'
) );

new Jetpack_JSON_API_Plugins_Get_Endpoint( array(
	'description'     => 'Get the Plugin data.',
	'method'          => 'GET',
	'path'            => '/sites/%s/plugins/%s/',
	'stat'            => 'plugins:1',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$plugin'   => '(string) The plugin ID',
	),
	'response_format' => Jetpack_JSON_API_Plugins_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins/hello-dolly%20hello'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-modify-endpoint.php' );

new Jetpack_JSON_API_Plugins_Modify_Endpoint( array(
	'description'     => 'Activate/Deactivate a Plugin on your Jetpack Site, or set automatic updates',
	'method'          => 'POST',
	'path'            => '/sites/%s/plugins/%s',
	'stat'            => 'plugins:1:modify',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$plugin'   => '(string) The plugin ID',
	),
	'request_format' => array(
		'action'       => '(string) Possible values are \'update\'',
		'autoupdate'   => '(bool) Whether or not to automatically update the plugin',
		'active'       => '(bool) Activate or deactivate the plugin',
		'network_wide' => '(bool) Do action network wide (default value: false)',
	),
	'response_format' => Jetpack_JSON_API_Plugins_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'action' => 'update',
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins/hello-dolly%20hello'
) );

new Jetpack_JSON_API_Plugins_Modify_Endpoint( array(
	'description'     => 'Activate/Deactivate a list of plugins on your Jetpack Site, or set automatic updates',
	'method'          => 'POST',
	'path'            => '/sites/%s/plugins',
	'stat'            => 'plugins:modify',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
	),
	'request_format' => array(
		'action'       => '(string) Possible values are \'update\'',
		'autoupdate'   => '(bool) Whether or not to automatically update the plugin',
		'active'       => '(bool) Activate or deactivate the plugin',
		'network_wide' => '(bool) Do action network wide (default value: false)',
		'plugins'      => '(array) A list of plugin ids to modify',
	),
	'response_format' => array(
		'plugins'       => '(array:plugin) An array of plugin objects.',
		'updated'       => '(array) A list of plugin ids that were updated. Only present if action is update.',
		'not_updated'   => '(array) A list of plugin ids that were not updated. Only present if action is update.',
		'log'           => '(array) Update log. Only present if action is update.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'active'  => true,
			'plugins' => array(
				'jetpack/jetpack',
				'akismet/akismet',
			),
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-install-endpoint.php' );
// POST /sites/%s/plugins/%s/install
new Jetpack_JSON_API_Plugins_Install_Endpoint( array(
	'description'     => 'Install a plugin to your jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'plugins:1:install',
	'method'          => 'POST',
	'path'            => '/sites/%s/plugins/%s/install',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$plugin' => '(int|string) The plugin slug to install',
	),
	'response_format' => Jetpack_JSON_API_Plugins_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins/akismet/install'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-plugins-delete-endpoint.php' );
// POST /sites/%s/plugins/%s/delete
new Jetpack_JSON_API_Plugins_Delete_Endpoint( array(
	'description'     => 'Delete/Uninstall a plugin from your jetpack blog',
	'group'           => '__do_not_document',
	'stat'            => 'plugins:1:delete',
	'method'          => 'POST',
	'path'            => '/sites/%s/plugins/%s/delete',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$plugin' => '(int|string) The plugin slug to delete',
	),
	'response_format' => Jetpack_JSON_API_Plugins_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins/akismet%2Fakismet/delete'
) );

new Jetpack_JSON_API_Plugins_Modify_Endpoint( array(
	'description'     => 'Update a Plugin on your Jetpack Site',
	'method'          => 'POST',
	'path'            => '/sites/%s/plugins/%s/update/',
	'stat'            => 'plugins:1:update',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$plugin'   => '(string) The plugin ID',
	),
	'response_format' => Jetpack_JSON_API_Plugins_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/plugins/hello-dolly%20hello/update'
) );

// Jetpack Modules

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-modules-endpoint.php' );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-modules-get-endpoint.php' );

new Jetpack_JSON_API_Modules_Get_Endpoint( array(
	'description'     => 'Get the info about a Jetpack Module on your Jetpack Site',
	'method'          => 'GET',
	'path'            => '/sites/%s/jetpack/modules/%s/',
	'stat'            => 'jetpack:modules:1',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$module' => '(string) The module name',
	),
	'response_format' => Jetpack_JSON_API_Modules_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/jetpack/modules/stats'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-modules-modify-endpoint.php' );

new Jetpack_JSON_API_Modules_Modify_Endpoint( array(
	'description'     => 'Modify the status of a Jetpack Module on your Jetpack Site',
	'method'          => 'POST',
	'path'            => '/sites/%s/jetpack/modules/%s/',
	'stat'            => 'jetpack:modules:1',
	'path_labels' => array(
		'$site'   => '(int|string) The site ID, The site domain',
		'$module' => '(string) The module name',
	),
	'request_format' => array(
		'active'   => '(bool) The module activation status',
	),
	'response_format' => Jetpack_JSON_API_Modules_Endpoint::$_response_format,
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'active' => true,
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/jetpack/modules/stats'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-modules-list-endpoint.php' );

new Jetpack_JSON_API_Modules_List_Endpoint( array(
	'description'     => 'Get the list of available Jetpack modules on your site',
	'method'          => 'GET',
	'path'            => '/sites/%s/jetpack/modules',
	'stat'            => 'jetpack:modules',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'found'  => '(int) The total number of modules found.',
		'modules' => '(array) An array of module objects.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/jetpack/modules'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-updates-status-endpoint.php' );

new Jetpack_JSON_API_Updates_Status( array(
	'description'     => 'Get counts for available updates',
	'method'          => 'GET',
	'path'            => '/sites/%s/updates',
	'stat'            => 'updates',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'plugins'      => '(int) The total number of plugins updates.',
		'themes'       => '(int) The total number of themes updates.',
		'wordpress'    => '(int) The total number of core updates.',
		'translations' => '(int) The total number of translation updates.',
		'total'        => '(int) The total number of updates.',
		'wp_version'   => '(safehtml) The wp_version string.',
		'wp_update_version' => '(safehtml) The wp_version to update string.',
		'jp_version'   => '(safehtml) The site Jetpack version.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/updates'
) );


// Jetpack Extras

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-check-capabilities-endpoint.php' );

new Jetpack_JSON_API_Check_Capabilities_Endpoint( array(
	'description'     => 'Check if the current user has a certain capability over a Jetpack site',
	'method'          => 'GET',
	'path'            => '/sites/%s/me/capability',
	'stat'            => 'me:capabulity',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => '(bool) True if the user has the queried capability.',
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'capability' => 'A single capability or an array of capabilities'
		)
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/me/capability'
) );


// CORE
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-core-endpoint.php' );
require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-core-modify-endpoint.php' );

new Jetpack_JSON_API_Core_Endpoint( array(
	'description'     => 'Gets info about a Jetpack blog\'s core installation',
	'method'          => 'GET',
	'path'            => '/sites/%s/core',
	'stat'            => 'core',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'version' => '(string) The current version',
		'autoupdate' => '(bool) Whether or not we automatically update core'
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/core'
) );

new Jetpack_JSON_API_Core_Modify_Endpoint( array(
	'description'     => 'Update WordPress installation on a Jetpack blog',
	'method'          => 'POST',
	'path'            => '/sites/%s/core/update',
	'stat'            => 'core:update',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'request_format' => array(
		'version'   => '(string) The core version to update',
	),
	'response_format' => array(
		'version' => '(string) The core version after the upgrade has run.',
		'log'     => '(array:safehtml) An array of log strings.',
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/core/update'
) );

new Jetpack_JSON_API_Core_Endpoint( array(
	'description'     => 'Toggle automatic core updates for a Jetpack blog',
	'method'          => 'POST',
	'path'            => '/sites/%s/core',
	'stat'            => 'core',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'request_format' => array(
		'autoupdate'   => '(bool) Whether or not we automatically update core',
	),
	'response_format' => array(
		'version' => '(string) The current version',
		'autoupdate' => '(bool) Whether or not we automatically update core'
	),
	'example_request_data' => array(
		'headers' => array(
			'authorization' => 'Bearer YOUR_API_TOKEN'
		),
		'body' => array(
			'autoupdate' => true,
		),
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1/sites/example.wordpress.org/core'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-sync-endpoint.php' );

// POST /sites/%s/sync
new Jetpack_JSON_API_Sync_Endpoint( array(
	'description'     => 'Force sync of all options and constants',
	'method'          => 'POST',
	'path'            => '/sites/%s/sync',
	'stat'            => 'sync',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'request_format' => array(
		'force'   => '(bool=false) Force a full sync by clearing the full sync lock',
		'clear'   => '(bool=false) Clear the sync queue before full-syncing',
		'modules' => '(string) Comma-delimited set of sync modules to use (default: all of them)'
	),
	'response_format' => array(
		'scheduled' => '(bool) Whether or not the synchronisation was scheduled'
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/sync'
) );

// GET /sites/%s/sync/status
new Jetpack_JSON_API_Sync_Status_Endpoint( array(
	'description'     => 'Status of the current full sync or the previous full sync',
	'method'          => 'GET',
	'path'            => '/sites/%s/sync/status',
	'stat'            => 'sync-status',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'started' => '(int|null) The unix timestamp when the last sync started',
		'queue_finished' => '(int|null) The unix timestamp when the enqueuing was done for the last sync',
		'sent_started' => '(int|null) The unix timestamp when the last sent process started',
		'finished' => '(int|null) The unix timestamp when the last sync finished',
		'queue'  => '(array) Count of actions that have been added to the queue',
		'sent'  => '(array) Count of actions that have been sent',
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/sync/status'
) );


// GET /sites/%s/data-checksums
new Jetpack_JSON_API_Sync_Check_Endpoint( array(
	'description'     => 'Check that cacheable data on the site is in sync with wordpress.com',
	'group'           => '__do_not_document',
	'method'          => 'GET',
	'path'            => '/sites/%s/data-checksums',
	'stat'            => 'data-checksums',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'posts' => '(string) Posts checksum',
		'comments' => '(string) Comments checksum',
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/data-checksums'
) );

// GET /sites/%s/data-histogram
new Jetpack_JSON_API_Sync_Histogram_Endpoint( array(
	'description'     => 'Get a histogram of checksums for certain synced data',
	'group'           => '__do_not_document',
	'method'          => 'GET',
	'path'            => '/sites/%s/data-histogram',
	'stat'            => 'data-histogram',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'query_parameters' => array(
		'object_type' => '(string=posts) The type of object to checksum - posts, comments or options',
		'buckets' => '(int=10) The number of buckets for the checksums',
		'start_id' => '(int=0) Starting ID for the range',
		'end_id' => '(int=null) Ending ID for the range'
	),
	'response_format' => array(
		'histogram' => '(array) Associative array of histograms by ID range, e.g. "500-999" => "abcd1234"'
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/data-histogram'
) );

$sync_settings_response = array(
	'dequeue_max_bytes' => '(int|bool=false) Maximum bytes to read from queue in a single request',
	'sync_wait_time'    => '(int|bool=false) Minimum time between requests in seconds',
	'upload_max_bytes'  => '(int|bool=false) Maximum bytes to send in a single request',
	'upload_max_rows'   => '(int|bool=false) Maximum rows to send in a single request',
	'max_queue_size'    => '(int|bool=false) Maximum queue size that that the queue is allowed to expand to in DB rows to prevent the DB from filling up. Needs to also meet the max_queue_lag limit.',
	'max_queue_lag'     => '(int|bool=false) Maximum queue lag in seconds used to prevent the DB from filling up. Needs to also meet the max_queue_size limit.',
);

// GET /sites/%s/sync/settings
new Jetpack_JSON_API_Sync_Get_Settings_Endpoint( array(
	'description'     => 'Update sync settings',
	'method'          => 'GET',
	'group'           => '__do_not_document',
	'path'            => '/sites/%s/sync/settings',
	'stat'            => 'write-sync-settings',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => $sync_settings_response,
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/sync/settings'
) );

// POST /sites/%s/sync/settings
new Jetpack_JSON_API_Sync_Modify_Settings_Endpoint( array(
	'description'     => 'Update sync settings',
	'method'          => 'POST',
	'group'           => '__do_not_document',
	'path'            => '/sites/%s/sync/settings',
	'stat'            => 'write-sync-settings',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'request_format' => $sync_settings_response,
	'response_format' => $sync_settings_response,
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/sync/settings'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-log-endpoint.php' );

new Jetpack_JSON_API_Jetpack_Log_Endpoint( array(
	'description'     => 'Get the Jetpack log',
	'method'          => 'GET',
	'path'            => '/sites/%s/jetpack-log',
	'stat'            => 'log',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'request_format' => array(
		'event'   => '(string) The event to filter by, by default all entries are returned',
		'num'   => '(int) The number of entries to get, by default all entries are returned'
	),
	'response_format' => array(
		'log' => '(array) An array of jetpack log entries'
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/jetpack-log'
) );

require_once( $json_jetpack_endpoints_dir . 'class.jetpack-json-api-maybe-auto-update-endpoint.php' );

new Jetpack_JSON_API_Maybe_Auto_Update_Endpoint( array(
	'description'     => 'Maybe Auto Update Core, Plugins, Themes and Languages',
	'method'          => 'POST',
	'path'            => '/sites/%s/maybe-auto-update',
	'stat'            => 'maybe-auto-update',
	'path_labels' => array(
		'$site' => '(int|string) The site ID, The site domain'
	),
	'response_format' => array(
		'log' => '(array) Results of running the update job'
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/example.wordpress.org/maybe-auto-update'

) );

// Options
require_once( $json_jetpack_endpoints_dir . 'class.wpcom-json-api-get-option-endpoint.php' );

new WPCOM_JSON_API_Get_Option_Endpoint( array (
	'method' => 'GET',
	'description' => 'Fetches an option.',
	'group' => '__do_not_document',
	'stat' => 'option',
	'path' => '/sites/%s/option',
	'path_labels' => array(
		'$site' => '(int|string) Site ID or domain',
	),
	'query_parameters' => array(
		'option_name' => '(string) The name of the option to fetch.',
		'site_option' => '(bool=false) True if the option is a site option.',
	),
	'response_format' => array(
		'option_value' => '(string|object) The value of the option.',
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/82974409/option?option_name=blogname',
	'example_request_data' => array(
		'headers' => array( 'authorization' => 'Bearer YOUR_API_TOKEN' ),
	),
) );

require_once( $json_jetpack_endpoints_dir . 'class.wpcom-json-api-update-option-endpoint.php' );

new WPCOM_JSON_API_Update_Option_Endpoint( array (
	'method' => 'POST',
	'description' => 'Updates an option.',
	'group' => '__do_not_document',
	'stat' => 'option:update',
	'path' => '/sites/%s/option',
	'path_labels' => array(
		'$site' => '(int|string) Site ID or domain',
	),
	'query_parameters' => array(
		'option_name' => '(string) The name of the option to fetch.',
		'site_option' => '(bool=false) True if the option is a site option.',
		'is_array' => '(bool=false) True if the value should be converted to an array before saving.',
	),
	'request_format' => array(
		'option_value' => '(string|object) The new value of the option.',
	),
	'response_format' => array(
		'option_value' => '(string|object) The value of the updated option.',
	),
	'example_request' => 'https://public-api.wordpress.com/rest/v1.1/sites/82974409/option',
	'example_request_data' => array(
		'headers' => array( 'authorization' => 'Bearer YOUR_API_TOKEN' ),
		'body' => array(
			'option_value' => 'My new blog name'
		),
	),
) );
