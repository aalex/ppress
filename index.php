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
ini_set("display_errors", "1");
ini_set("error_reporting", E_ALL);

require_once "php/bootstrap.php";

// Get all posts
$all_blog_ids = get_all_blog_id();
// This array is in the form:
// blog_id => array(post_id => array(array(word, image_path), ...))
$all_posts = array();
foreach ($all_blog_ids as $k => $blog_id)
{
    $all_posts[$blog_id] = array();
    $post_id = get_post_for_blog($blog_id);
    $all_posts[$blog_id][0] = array();
    $words = get_words_for_post($post_id);
    foreach ($words as $kk => $word)
    {
        $all_posts[$blog_id][0][] = array($word, "FILLME");
        // TODO add images to this big array as well
    }
}
$tpl = new Savant3();
$tpl->blogs = $all_posts;
$tpl->display("tpl/page.tpl.php");
require_once "php/teardown.php";
?>
