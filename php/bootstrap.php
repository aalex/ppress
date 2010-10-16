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
define("CONFIG_SAMPLE", "config.example.php");
define("CONFIG_CUSTOM", "config.php");
$config_custom_full_path = dirname(__FILE__) . "/" . CONFIG_CUSTOM;
$config_sample_full_path = dirname(__FILE__) . "/" . CONFIG_SAMPLE;
if (file_exists($config_custom_full_path))
{
    require_once $config_custom_full_path;
} 
else 
{
    require_once $config_sample_full_path;
} 
?>
