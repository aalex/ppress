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

// Create new phpFlickr object
$flickr =& new phpFlickr(FLICKR_APIKEY);
$flickr->enableCache( "db", "mysql://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . "/" . DB_DATABASE);
/**
 * Returns the URL or the most relevant image for a given word.
 * @param $word: string
 */
function get_first_for_word(&$flickr, $word)
{
    // TODO most relevant, not interesting
    // Search for most interesting photos with the text "cat"
    $args = array("text" => $word, "sort" => "relevance", "per_page" => 1);
    $result = $flickr->photos_search($args);
    // TODO treat this error in case there is none
    $photo = $result["photo"][0];
    return $flickr->buildPhotoURL($photo, "Square");
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
// just a test:
$words = array();
$words[] = "你好";
$words[] = "中文";
$words[] = "cat";

foreach ($words as $word)
{
    $url = get_first_for_word($flickr, $word);
    $local = PP_FILES_DIR . "/" . get_url_basename($url);
    download_file($url, $local);
    echo "------------\n";
    echo "<img src=\"$url\" />\n";
    echo "<img src=\"$local\" />\n";
}
?>
