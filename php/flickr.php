<?php
/**
 TODO: use most relevant, not interesting.
 TODO: filter to use only CC contents
 */
require_once("php/bootstrap.php");
require_once("phpFlickr.php");

/**
 * Downloads a file synchronously.
 * @param $remote: string remote URL.
 * @param $local string local fle path.
 */
function download_file($remote, $local)
{
    $ch = curl_init($remote);
    $fp = fopen($local, "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

// Create new phpFlickr object
$flickr = new phpFlickr(FLICKR_APIKEY);
$flickr->enableCache( "db", "mysql://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . "/" . DB_DATABASE);

echo "<p>Most interesting in a full text search for \"cat\":<br>\n";
// Search for most interesting photos with the text "cat"
$photos_cat = $flickr->photos_search(array("text"=>"cat", "sort"=>"interestingness-desc", "per_page"=>1));
foreach ((array)$photos_cat['photo'] as $photo) {
    // Build image and link tags for each photo
    echo "<a href=http://www.flickr.com/photos/$photo[owner]/$photo[id]>";
    echo "<img border='0' alt='$photo[title]' ". "src=" . $flickr->buildPhotoURL($photo, "Square") . ">";
    echo "</a>";
}
echo "</p>\n";




?>
