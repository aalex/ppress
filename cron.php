<?php
/**
 * ppress
 * 
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

require_once("php/bootstrap.php");
require_once("phpFlickr.php");
require_once("php/flickr.php");

// Create new phpFlickr object
$flickr = new phpFlickr(FLICKR_APIKEY);
$flickr->enableCache( "db", "mysql://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . "/" . DB_DATABASE);

foreach (get_all_words() as $word) {
	$url = get_first_for_word($flickr, $word);

    if ($url) {
		echo '.';
		$local = PP_FILES_DIR . "/" . get_url_basename($url);
		download_file($url, $local);
		$id = insert_image($url, $local);
		associate_word($word, $id);
	} else {
		echo '!';
	}
}

