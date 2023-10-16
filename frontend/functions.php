<?php

namespace wp_questions;

use WordPressTools;

$instance = WordPressTools::getInstance( __FILE__ );
$instance->route_manager->registerRoutes();