<?php

// REST API
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/endpoints.php';

// CPT CREATION
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/create-cpts.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/metabox.php';

// REQUIRED PLUGIN
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/class-tgm-plugin-activation.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/required.php';

// TWITTER
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/twitter/twitteroauth/autoload.php';
//require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/twitter/twitteroauth/src/TwitterOAuth.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/twitter/twitter.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/twitter/functions.php';

// FRONT END
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/display-functions.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/front-end-enqueue.php';
require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/pre-get-posts.php';
