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

/**
 * Downloads a file synchronously.
 * @param $remote: string remote URL.
 * @param $local string local fle path.
 */
function download_file($remote, $local)
{
    // TODO do not download if file exists
    // TODO handle errors!
    //if (dirname($local)
    $ch = curl_init($remote);
    $fp = fopen($local, "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}



/**
 * Returns the URL or the most relevant image for a given word.
 * @param $word: string
 */
function get_first_image_for_word(&$flickr, $word)
{
    // TODO most relevant, not interesting
    // Search for most interesting photos with the text "cat"
    $args = array("text" => $word, "sort" => "relevance", "per_page" => 1);
    $result = $flickr->photos_search($args);
    // TODO treat this error in case there is none
    if (isset($result["photo"][0])) {
		$photo = $result['photo'][0];

		return array(
			'thumb' => $flickr->buildPhotoURL($photo, "Square"),
			'url' => 'http://flic.kr/p/' . base_encode($photo['id'], '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ'),
		);
	}
}

function base_encode($num, $alphabet) {
	$base_count = strlen($alphabet);
	$encoded = '';
	while ($num >= $base_count) {
		$div = $num/$base_count;
		$mod = ($num-($base_count*intval($div)));
		$encoded = $alphabet[$mod] . $encoded;
		$num = intval($div);
	}

	if ($num) $encoded = $alphabet[$num] . $encoded;

	return $encoded;
}

/**
 * Returns the extension for a file.
 * (probably useless)
 */
function get_extension($url)
{
    $_tmp = explode(".", $url);
    $extension = array_pop($_tmp);
    return $extension;
}
/**
 * Returns the file name for a given URL.
 */
function get_url_basename($url)
{
    $path = parse_url($url, PHP_URL_PATH);
    return basename($path);
}
