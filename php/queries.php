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

function _esc($value) 
{
	return "'" . mysql_real_escape_string($value) . "'";
}

function query($query, $values = array())
{
	$values = array_map("_esc", $values);
	$query = str_replace(array_keys($values), array_values($values), $query);

	return mysql_query($query);
}

/**
 * Returns an array whose values are all blog ID numbers.
 * @return: array int:int
 */
function get_all_blog()
{
    $ret = array();
    $sql = "SELECT blog_id, title, author, intro, URL FROM blog;";
    $result = mysql_query($sql);
    if (! $result)
        die("Could not successfully run query ($sql) from DB: " . mysql_error());
    while ($row = mysql_fetch_assoc($result))
    {
        //print_r($row);
        // append to the array
        $ret[] = $row;
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
    $sql = "SELECT text, original_image_url url, local_image_name local, image_width width, image_height height
		FROM word 
		LEFT JOIN `image` ON `word`.`image_id` = `image`.`image_id`
		WHERE post_id = :post ORDER BY position_in_text;";
    $result = query($sql, array(
		':post' => $post_id,
	));

    if (! $result)
        die("Could not successfully run query ($sql) from DB: " . mysql_error());
    while ($row = mysql_fetch_assoc($result))
    {
        // append to array
        $ret[] = $row;
    }
    // TODO: return False or raise exception if there is none
    mysql_free_result($result);
    return $ret;
}
/**
 * each row in the array is a array of [text, word id]
 */
function get_all_words()
{
	$result = mysql_query('
		SELECT DISTINCT `text`, `word_id` FROM `word`
		WHERE
			`is_punctuation` = 0
			AND `is_chinese` = 1
        ORDER BY `post_id`
		');
	$words = array();
	while ($row = mysql_fetch_assoc($result))
	{
		$words[] = array("word"=> $row['text'], "word_id" =>$row['word_id']);
	}

	return $words;
}

function insert_image($url, $local)
{
	$info = getimagesize($local);
    if (is_array($info))
    {
        $width = array_shift($info);
        $height = array_shift($info);

        query('INSERT INTO `image` (`original_image_url`, `local_image_name`, `image_width`, `image_height`) VALUES(:url, :name, :width, :height)', array(
            ':url' => $url,
            ':name' => $local,
            ':width' => $width,
            ':height' => $height,
        ));

        return mysql_insert_id();
    }
    else 
    {
        return NULL;
    }
}

function associate_word($text, $image_id)
{
	query('UPDATE `word` SET `has_an_image` = 1, image_is_downloaded = 1, image_id = :image_id WHERE `text` = :text', array(
		':image_id' => $image_id,
		':text' => $text,
	));
}

function reset_images()
{
	query('TRUNCATE TABLE `image`');
	query('UPDATE word SET image_id = NULL, has_image = 0, image_is_downloaded = 0');
}

