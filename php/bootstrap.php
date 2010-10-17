<?php
/**
 * ppress
 * 
 * Copyright (C) 2010 Ellen Tang <ellen.s.tang@gmail.com>
 * Copyright (C) 2010 Alexandre Quessy <alexandre@quessy.net>
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
// Load config:
$_config_custom_full_path = dirname(__FILE__) . "/" . "config.php";
$_config_sample_full_path = dirname(__FILE__) . "/" . "config.example.php";

if (file_exists($_config_custom_full_path))
    require_once $_config_custom_full_path;
else
    require_once $_config_sample_full_path;
/**
 * Prints if config set to verbose.
 */
function verb($what)
{
    if (PP_VERBOSE)
    {
        echo($what . "<br /> \n");
    }
}
/**
 * Add a path to the include path.
 */
function add_to_path($path)
{
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
}

verb("Loaded config.");
// Add stuff to the path
add_to_path(dirname(__FILE__) . "/libs/phpflickr-3.0");
add_to_path(dirname(__FILE__) . "/libs/Savant3-3.0.1");
require_once "Savant3.php";

/**
 *  Connect to the MySQL database:
 */
function &db_connect()
{
    //FIXME: Something it hangs here.
    // See http://bugs.php.net/bug.php?id=17581
    verb("Connecting to the database:");
    $db_conn =& mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$db_conn)
    {
        verb("Could not connect to the MySQL server.");
        die("MySQL error: " . mysql_error());
    }
    else
    {
        verb("Connected successfully to the MySQL server.");
    }
    if (! mysql_select_db(DB_DATABASE)) 
    {
        die("Unable to select database: " . mysql_error());
    }
    mysql_set_charset('utf8');
    verb("Done with the database.");
    return $db_conn;
}
require_once "php/queries.php";

verb("Done bootstrapping.");
?>
