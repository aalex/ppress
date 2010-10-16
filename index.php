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
ini_set("display_errors", "1");
ini_set("error_reporting", E_ALL);

echo "Bootstrapping:\n<br />";
echo time() . "\n<br />";
require_once "php/bootstrap.php";
$db =& db_connect();
$tpl =& new Savant3();
//echo "Show the page:\n<br />";
$tpl->display("tpl/page.tpl.php");
//require_once "tpl/page.tpl.php";
require_once "php/teardown.php";
verb("DONE.");
?>
