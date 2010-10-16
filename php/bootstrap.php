<?php
/**
 * ppress
 * 
 * Copyright (C) 2010 Ellen Tang <ellen.s.tang@gmail.com>
 * Copyright (C) 2010 Alexandre Quessy <alexandre@quessy.net>
 * Copyright (C) 2010 Yan Chen <sandrine.chen@gmail.com>
 * 
 * ppress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * ppress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the gnu general public license
 * along with ppress.  If not, see <http://www.gnu.org/licenses/>.
 */
// This file should be only included once.
// Load config
$CONFIG_SAMPLE = "config.example.php";
$CONFIG_CUSTOM = "config.php";
$config_custom_full_path = dirname(__FILE__) . "/" . $CONFIG_CUSTOM;
$config_sample_full_path = dirname(__FILE__) . "/" . $CONFIG_SAMPLE;
if (file_exists($config_custom_full_path))
    require_once $config_custom_full_path;
else
    require_once $config_sample_full_path;
$db_conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$db_conn)
    die("Could not connect to MySQL database: " . mysql_error());
if (PP_VERBOSE)
    echo "Connected successfully\n";

/**
 * Prints if config set to verbose.
 */
function verb($what)
{
    if (PP_VERBOSE)
        echo($what);
}
function add_to_path($path)
{
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
}
add_to_path(dirname(__FILE__) . "/libs/phpflickr-3.0");
?>
