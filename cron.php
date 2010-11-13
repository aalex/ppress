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

// needs PEAR::Log > 1.0.0  http://pear.php.net/package/Log
require_once 'Log.php';

$conf = array('mode' => 0600, 'timeFormat' => '%Y-%m-%d %H:%M:%S');
$log = &Log::singleton('file', 'logging-cron-output.log', 'ICTM', $conf);
$log->log("Starting a periodic task --------");

// Create new phpFlickr object
$flickr = new phpFlickr(FLICKR_APIKEY);
$flickr->enableCache( "db", "mysql://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . "/" . DB_DATABASE);
$log->log("TRUNCATE: We empty the `word` table completely.");
reset_images();

$words = &get_all_words();
$log->log("There are ". count($words) . " unique words to download images for!");

foreach ($words as $word_data) {
    $word = $word_data["word"];
    $word_id = $word_data["word_id"];
    $info = get_first_image_for_word($flickr, $word);
    usleep(1000 * PP_SLEEP_BETWEEN_EACH_FLICK_QUERY_MS);

    if ($info) {
        echo '.';
        $local = PP_FILES_DIR . "/" . get_url_basename($info['thumb']);
        $download_it = TRUE;
        if (! PP_DOWNLOAD_AGAIN_EVEN_IF_GOT_IT)
        {
            if (file_exists($local))
            {
                $download_it = FALSE;
                $log->log("old: We already have the ". $local . " image for word " . $word . ". Not downloading it.");
            }
        }
        if ($download_it)
        {
            download_file($info['thumb'], $local);
            $log->log("NEW: Downloaded image ". $local . " for word " . $word);
        }
        $image_id = insert_image($info['url'], $local);
        if ($image_id != NULL)
        {
            associate_word($word, $image_id);
        } else {
            $log->log("ERROR: Could not get image size for ". $local . " for word " . $word);
        }
    } else {
        echo '!';
        $log->log("NOT FOUND: Could not find an image URL from Flickr for word " . $word);
    }
}

