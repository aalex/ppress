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

// MySQL queries for the picture press

/**
 * Returns an array whose values are all blog ID numbers.
 * @return: array int:int
 */
function get_all_blog_id()
{
    $ret = array();
    $sql = "SELECT blog_id FROM blog;";
    $result = mysql_query($sql);
    if (! $result)
        die("Could not successfully run query ($sql) from DB: " . mysql_error());
    while ($row = mysql_fetch_assoc($result))
    {
        print_r($row);
        // append to the array
        $ret[] = $row["blog_id"];
    }
    mysql_free_result($result);
    return $ret;
}

/**
 * Returns the single post ID for a given blog.

 * For now, we only have one post per blog. 
 * @param $blog_id: int
 * @return: post_id int
 */
function get_post_for_blog($blog_id)
{
    $ret = 0;
    $sql = "SELECT post_id FROM post WHERE blog_id = " . $blog_id . ";";
    $result = mysql_query($sql);
    if (! $result)
        die("Could not successfully run query ($sql) from DB: " . mysql_error());
    while ($row = mysql_fetch_assoc($result))
    {
        $ret = $row["post_id"];
    }
    // TODO: return False or raise exception if there is none
    mysql_free_result($result);
    return $ret;
}

/**
 * Returns all the words for a post.
 * @return: array int:string
 */
function get_words_for_post($post_id)
{
    $ret = array();
    $sql = "SELECT text FROM word WHERE post_id = " . $post_id . " ORDER BY position_in_text;";
    $result = mysql_query($sql);
    if (! $result)
        die("Could not successfully run query ($sql) from DB: " . mysql_error());
    while ($row = mysql_fetch_assoc($result))
    {
        // append to array
        $ret[] = $row["text"];
    }
    // TODO: return False or raise exception if there is none
    mysql_free_result($result);
    return $ret;
}
?>
