<?php
/*
Plugin Name: LuckyWP Table of Contents
Plugin URI: https://theluckywp.com/product/table-of-contents/
Description: Creates a table of contents for your posts/pages. Works automatically or manually (via shortcode, Gutenberg block or widget).
Version: 1.9.1
Author: LuckyWP
Author URI: https://theluckywp.com/
Text Domain: luckywp-table-of-contents
Domain Path: /languages

LuckyWP Table of Contents is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

LuckyWP Table of Contents is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with LuckyWP Table of Contents. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

require 'lwptocAutoloader.php';
$lwptocAutoloader = new lwptocAutoloader();
$lwptocAutoloader->register();
$lwptocAutoloader->addNamespace('luckywp\tableOfContents', __DIR__);

$config = require(__DIR__ . '/config/plugin.php');
(new \luckywp\tableOfContents\plugin\Plugin($config))->run('1.9.1', __FILE__, 'lwptoc_');

require_once __DIR__ . '/functions.php';
