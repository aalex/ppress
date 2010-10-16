<?php
/**
 TODO: use most relevant, not interesting.
 TODO: filter to use only CC contents
 */
require_once("php/bootstrap.php");
require_once("phpFlickr.php");
// Create new phpFlickr object
$flickr = new phpFlickr(FLICKR_APIKEY);
$flickr->enableCache( "db", "mysql://" . DB_USER . ":" . DB_PASSWORD . "@" . DB_HOST . "/" . DB_DATABASE);

echo "<p>Most interesting in a full text search for \"cat\":<br>\n";
// Search for most interesting photos with the text "cat"
$photos_cat = $flickr->photos_search(array("text"=>"cat", "sort"=>"interestingness-desc", "per_page"=>6));
foreach ((array)$photos_cat['photo'] as $photo) {
    // Build image and link tags for each photo
    echo "<a href=http://www.flickr.com/photos/$photo[owner]/$photo[id]>";
    echo "<img border='0' alt='$photo[title]' ".
        "src=" . $flickr->buildPhotoURL($photo, "Square") . ">";
    echo "</a>";
}
echo "</p>\n";
?>
