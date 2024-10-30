<?php
/*
Plugin Name: MDBG Chinese-English dictionary
Plugin URI: http://www.mdbg.net/chindict/chindict.php?page=wordpress
Description: Automatically links Chinese characters to the <a href="http://www.mdbg.net/chindict/chindict.php">MDBG Chinese-English dictionary</a>, allows conversion of pinyin tone numbers to tone marks and linking pinyin to pronunciation examples.
Version: 1.1
Author: MDBG
Author URI: http://www.mdbg.net/chindict/chindict.php

    Copyright 2010  MDBG  (http://www.mdbg.net/)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

require_once ( dirname(__FILE__) . '/conv_py.php');


// ---------- Option menu section ----------

// set option defaults
if(get_option('mdbg_mirror', null) === null)
{
	update_option('mdbg_mirror', 'http://www.mdbg.net/chindict/');
}
if(get_option('mdbg_function', null) === null)
{
	update_option('mdbg_function', 'wdqchs');
}
if(get_option('mdbg_simptrad', null) === null)
{
	update_option('mdbg_simptrad', '0');
}
if(get_option('mdbg_autolink_the_content', null) === null)
{
	update_option('mdbg_autolink_the_content', '1');
}
if(get_option('mdbg_autolink_the_excerpt', null) === null)
{
	update_option('mdbg_autolink_the_excerpt', '1');
}
if(get_option('mdbg_autolink_comment_text', null) === null)
{
	update_option('mdbg_autolink_comment_text', '1');
}
if(get_option('mdbg_tag_hanzi', null) === null)
{
	update_option('mdbg_tag_hanzi', '1');
}
if(get_option('mdbg_tag_pinyin', null) === null)
{
	update_option('mdbg_tag_pinyin', '1');
}
if(get_option('mdbg_pinyin_mode', null) === null)
{
	update_option('mdbg_pinyin_mode', '1');
}


function mdbg_admin_menu()
{
	add_options_page(
		'MDBG Options',
		'MDBG',
		'manage_options',
		__FILE__,
		'mdbg_options_page'
	);
}

add_action('admin_menu','mdbg_admin_menu');

function mdbg_options_page()
{
	print("<h2>MDBG Plugin Options</h2>");
	if(isset($_REQUEST['submit']))
	{
		mdbg_update_options();
	}
	mdbg_display_options_form();
}

function mdbg_update_options()
{
	update_option('mdbg_mirror', $_REQUEST['mdbg_mirror']);
	update_option('mdbg_function', $_REQUEST['mdbg_function']);
	update_option('mdbg_simptrad', $_REQUEST['mdbg_simptrad']);

	update_option('mdbg_autolink_the_content', $_REQUEST['mdbg_autolink_the_content']);
	update_option('mdbg_autolink_the_excerpt', $_REQUEST['mdbg_autolink_the_excerpt']);
	update_option('mdbg_autolink_comment_text', $_REQUEST['mdbg_autolink_comment_text']);

	update_option('mdbg_tag_hanzi', $_REQUEST['mdbg_tag_hanzi']);
	update_option('mdbg_tag_pinyin', $_REQUEST['mdbg_tag_pinyin']);

	update_option('mdbg_pinyin_mode', $_REQUEST['mdbg_pinyin_mode']);
}

function mdbg_display_options_form()
{
	$mdbg_mirror = get_option('mdbg_mirror');
	$mdbg_function = get_option('mdbg_function');
	$mdbg_simptrad = get_option('mdbg_simptrad');

	$mdbg_autolink_the_content = get_option('mdbg_autolink_the_content');
	$mdbg_autolink_the_excerpt = get_option('mdbg_autolink_the_excerpt');
	$mdbg_autolink_comment_text = get_option('mdbg_autolink_comment_text');

	$mdbg_tag_hanzi = get_option('mdbg_tag_hanzi');
	$mdbg_tag_pinyin = get_option('mdbg_tag_pinyin');

	$mdbg_pinyin_mode = get_option('mdbg_pinyin_mode');
?>
<form method="post">
<table class="form-table">
<tr>
<th colspan="2">
The autolink feature automatically links Chinese characters to the <a href="http://www.mdbg.net/chindict/chindict.php">MDBG Chinese-English dictionary</a>.
</th>
</tr>
<tr>
<th scope="row">
Autolink hanzi in
</th>
<td valign="top">
<input type="checkbox" name="mdbg_autolink_the_content" id="mdbg_autolink_the_content" value="1"<?php if($mdbg_autolink_the_content == '1') { print ' checked="checked"'; } ?> />
<label for="mdbg_autolink_the_content">Posts</label>
<br />
<input type="checkbox" name="mdbg_autolink_the_excerpt" id="mdbg_autolink_the_excerpt" value="1"<?php if($mdbg_autolink_the_excerpt == '1') { print ' checked="checked"'; } ?> />
<label for="mdbg_autolink_the_excerpt">Excerpts</label>
<br />
<input type="checkbox" name="mdbg_autolink_comment_text" id="mdbg_autolink_comment_text" value="1"<?php if($mdbg_autolink_comment_text == '1') { print ' checked="checked"'; } ?> />
<label for="mdbg_autolink_comment_text">Comments</label>
</td>
</tr>
<tr>
<th colspan="2">
Tags can be enabled to link specific Hanzi or Pinyin syllables. The opening and closing tag must be on the same line.
</th>
</tr>
<tr>
<th scope="row">
Allowed tags
</th>
<td valign="top">
<input type="checkbox" name="mdbg_tag_hanzi" id="mdbg_tag_hanzi" value="1"<?php if($mdbg_tag_hanzi == '1') { print ' checked="checked"'; } ?> />
<label for="mdbg_tag_hanzi">[hanzi]你好[/hanzi]</label>
<br />
<input type="checkbox" name="mdbg_tag_pinyin" id="mdbg_tag_pinyin" value="1"<?php if($mdbg_tag_pinyin == '1') { print ' checked="checked"'; } ?> />
<label for="mdbg_tag_pinyin">[pinyin]ni3hao3[/pinyin]</label>
</td>
</tr>
<tr>
<th scope="row">
<label for="mdbg_function">Hanzi link to</label>
</th>
<td valign="top">
<select name="mdbg_function" id="mdbg_function">
	<option value="wdqchs"<?php if($mdbg_function == 'wdqchs') { print ' selected="selected"'; } ?>>Sentence look up</option>
	<option value="wdqcha"<?php if($mdbg_function == 'wdqcha') { print ' selected="selected"'; } ?>>Text annotation</option>
</select>
<span class="setting-description">
Examples:
<a target="_blank" href="http://www.mdbg.net/chindict/chindict.php?wdrst=0&amp;wdqchs=%E8%BF%99%E6%98%AF%E6%B5%8B%E8%AF%95">Sentence look up</a>
and
<a target="_blank" href="http://www.mdbg.net/chindict/chindict.php?wdrst=0&amp;wdqcha=%E8%BF%99%E6%98%AF%E6%B5%8B%E8%AF%95&amp;wdqcham=1">Text annotation</a>
</span>
</td>
</tr>
<tr>
<th scope="row">
<label for="mdbg_simptrad">Simplified / Traditional</label>
</th>
<td valign="top">
<select name="mdbg_simptrad" id="mdbg_simptrad">
	<option value="0"<?php if($mdbg_simptrad == '0') { print ' selected="selected"'; } ?>>Simplified Hanzi</option>
	<option value="1"<?php if($mdbg_simptrad == '1') { print ' selected="selected"'; } ?>>Traditional Hanzi</option>
</select>
</td>
</tr>
<tr>
<th scope="row">
<label for="mdbg_pinyin_mode">Pinyin mode</label>
</th>
<td valign="top">
<select name="mdbg_pinyin_mode" id="mdbg_pinyin_mode">
	<option value="0"<?php if($mdbg_pinyin_mode == '0') { print ' selected="selected"'; } ?>>Convert tone numbers to marks</option>
	<option value="1"<?php if($mdbg_pinyin_mode == '1') { print ' selected="selected"'; } ?>>Convert tone numbers to marks and link pronunciation</option>
</select>
</td>
</tr>
<tr>
<th scope="row">
<label for="mdbg_mirror">Target mirror</label>
</th>
<td valign="top">
<select name="mdbg_mirror" id="mdbg_mirror">
	<option value="http://www.mdbg.net/chindict/"<?php if($mdbg_mirror == 'http://www.mdbg.net/chindict/') { print ' selected="selected"'; } ?>>English</option>
	<option value="http://www.mdbg.net/handedict/"<?php if($mdbg_mirror == 'http://www.mdbg.net/handedict/') { print ' selected="selected"'; } ?>>Deutsch</option>
</select>
</td>
</tr>
</table>
<p class="submit">
<input name="submit" class="button-primary" value="Save Changes" type="submit" />
</p>
</form>
<?php
}

function mdbg_plugins_action_links($links, $file) {
	static $this_plugin;
	if (!$this_plugin) {
		$this_plugin = plugin_basename(__FILE__);
	}
	if ($file == $this_plugin) {
		$settings_link = '<a href="options-general.php?page=mdbg-chinese-english-dictionary/mdbg-chinese-english-dictionary.php">' . __('Settings') . '</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}

add_filter("plugin_action_links", "mdbg_plugins_action_links", 10, 2);


// ---------- Filter section ----------

function mdbg_linkpinyin_syllable_callback($matches)
{
	return convertPinyinToneNumbersToMarks($matches[0]);
}

function mdbg_linkpinyin_callback($matches)
{
	$result = "";
	
	$pinyin = html_entity_decode($matches[1], ENT_QUOTES, "UTF-8");
	
	$pinyin_converted = preg_replace_callback('/[a-zü]+[1-5]/umsi', mdbg_linkpinyin_syllable_callback, $pinyin); 
	
	if(get_option('mdbg_pinyin_mode') == '1')
	{
		$pinyin_normalized = preg_replace('/\s+/umsi', ' ', $pinyin); 
		$pinyin_normalized = preg_replace('/([1-5])(?! )/umsi', '$1 ', $pinyin_normalized);
		$pinyin_normalized = trim($pinyin_normalized); 
		
		$result = '<a title="Listen to the pronunciation" href="#" onclick="voiceTextPopup(\'' . get_option('mdbg_mirror') . '\', \'' . htmlspecialchars($pinyin_normalized) . '\', \'' . htmlspecialchars($pinyin_converted) . '\'); return false">' . htmlspecialchars($pinyin_converted) . '</a>';
	}
	else
	{
		$result = htmlspecialchars($pinyin_converted);
	}
	
	return $result;
}

function mdbg_linkhanzi_callback($matches)
{
	if(preg_match('/<\\/?(p|table|tr|td|div)>/i', $matches[1]))
	{
		return '<em>[ERROR] cannot link hanzi containing paragraphs or tables</em>' . $matches[1] . '<em>[/ERROR]</em>';
	}
	else
	{
		$hanziStripped = trim(strip_tags(html_entity_decode($matches[1], ENT_QUOTES, "UTF-8")));
		return '<a title="Look up in MDBG Chinese-English dictionary" target="_blank" href="' . get_option('mdbg_mirror') . 'chindict.php?wdqcham=1&amp;wdrst=' . get_option('mdbg_simptrad') . '&amp;' . get_option('mdbg_function') . '=' . urlencode($hanziStripped) . '">' . $matches[1] . '</a>';
	}
}

function mdbg_autolink_callback($matches)
{
	return '<a title="Look up in MDBG Chinese-English dictionary" target="_blank" href="' . get_option('mdbg_mirror') . 'chindict.php?wdqcham=1&amp;wdrst=' . get_option('mdbg_simptrad') . '&amp;' . get_option('mdbg_function') . '=' . urlencode(html_entity_decode($matches[0], ENT_QUOTES, "UTF-8")) . '">' . $matches[0] . '</a>';
}

function mdbg_the_content_filter_pinyin($content)
{
	$content = preg_replace_callback('/(?!(?:[^<]+>|[^>]+<\/a>))\\[pinyin\\](.*?)\\[\\/pinyin\\]/u', mdbg_linkpinyin_callback, $content);
	return $content;
}

function mdbg_the_content_filter_hanzi($content)
{
	$content = preg_replace_callback('/(?!(?:[^<]+>|[^>]+<\/a>))\\[hanzi\\](.*?)\\[\\/hanzi\\]/u', mdbg_linkhanzi_callback, $content);
	return $content;
}

function mdbg_the_content_filter_autolink($content)
{
	$content = preg_replace_callback('/(?!(?:[^<]+>|[^>]+<\/a>))[\x{3000}-\x{303F}\x{3400}-\x{9FFF}\x{F900}-\x{FAFF}\x{FF00}-\x{FFEF}\x{20000}-\x{2FFFF}]+/ums', mdbg_autolink_callback, $content);
	return $content;
}

if(get_option('mdbg_autolink_the_content') == '1')
{
	add_filter('the_content', 'mdbg_the_content_filter_autolink', 20);
}
if(get_option('mdbg_autolink_the_excerpt') == '1')
{
	add_filter('the_excerpt', 'mdbg_the_content_filter_autolink', 20);
}
if(get_option('mdbg_autolink_comment_text') == '1')
{
	add_filter('comment_text', 'mdbg_the_content_filter_autolink', 20);
}

if(get_option('mdbg_tag_hanzi') == '1')
{
	add_filter('the_content', 'mdbg_the_content_filter_hanzi', 15);
}
if(get_option('mdbg_tag_pinyin') == '1')
{
	add_filter('the_content', 'mdbg_the_content_filter_pinyin', 15);
}

function mdbg_get_plugin_url()
{
	// function plugins_url() exists since WP 2.6.0
	if (function_exists('plugins_url'))
	{
		return trailingslashit(plugins_url(basename(dirname(__FILE__))));
	}
	else
	{
		// We do it manually; will not work if wp-content is renamed or redirected
		$result = str_replace("\\", '/', dirname(__FILE__));
		$result = trailingslashit(get_bloginfo('wpurl')) . trailingslashit(substr($result, strpos($result,'wp-content/')));
		return $result;
	}
}


function mdbg_wp_head()
{
	print "\n\t".'<!-- Generated by MDBG Plugin -->'
		. "\n\t".'<script type="text/javascript" src="' . mdbg_get_plugin_url() . 'js/mdbg.js"></script>'
		. "\n\t".'<!-- /Generated by MDBG Plugin -->'
		. "\n\t";
}

add_action('wp_head', 'mdbg_wp_head');

// ---------- Widget section ----------

function widget_mdbg_init()
{
	if (!function_exists('register_sidebar_widget'))
	{
		return;
	}
	
	function widget_mdbg($args) {
		extract($args);
?>
<?php echo $before_widget; ?>
<form target="_blank" method="get" action="<?php print get_option('mdbg_mirror'); ?>chindict.php">
<a target="_blank" href="<?php print get_option('mdbg_mirror'); ?>chindict.php"><img src="http://www.mdbg.net/logos/mdbg_dictionary_128x32.png" alt="MDBG Chinese-English dictionary" title="MDBG Chinese-English dictionary" border="0" /></a>
<br />
<input type="text" name="wdqb" style="width: 115px" /><input type="submit" value="Go" />
<input type="hidden" name="page" value="worddict" />
<input type="hidden" name="client" value="wp-wdb" />
<input type="hidden" name="wdrst" value="<?php get_option('mdbg_simptrad'); ?>" />
</form>
<?php echo $after_widget; ?>
<?php
	}
		
	// Register Widgets
	register_sidebar_widget('MDBG Dictionary', 'widget_mdbg');
}

add_action('plugins_loaded', 'widget_mdbg_init');

