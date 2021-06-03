<?php

define('ENGLISH', 'english');
define('CHINESE', 'chinese');
define('UYGHUR', 'uyghur');

$xinjiang_languages = [ENGLISH, CHINESE, UYGHUR];
$xinjiang_translations = xinjiang_get_translations();
$lang = xinjiang_get_current_language();
define('LANG', $lang);

function xinjiang_sprintf_array($format, $arr) { 
	return call_user_func_array('sprintf', array_merge((array)$format, $arr)); 
} 

function xinjiang_get_current_language() {
	global $xinjiang_languages;
	if (isset($_GET['l']) && in_array($_GET['l'], $xinjiang_languages)) {
		return $_GET['l'];
	}
	return ENGLISH;
}

function xinjiang_get_languages() {
	global $xinjiang_languages;

	$language_terms = get_terms('languages', [
		'hide_empty' => false,
	]);

	$languages = [];

	foreach($xinjiang_languages as $xinjiang_language) {
		$languages[$xinjiang_language] = (object) [];
	}

	foreach($language_terms as $language_term) {

		if (in_array($language_term->slug, $xinjiang_languages)) {
			$languages[$language_term->slug] = $language_term;
		}
	}

	return $languages;

}

function xinjiang_get_translations() {
	if (function_exists('get_field')) {
		$translations = get_field('translations', 'options');
		$dictionary = [];

		foreach($translations as $translation) {
			$key = array_shift($translation);
			$dictionary[$key] = $translation;
		}

		return $dictionary;
	}
}

function xinjiang_translate($term, $lang = LANG, $params = false) {
	global $xinjiang_translations;

	
	if (isset($xinjiang_translations[$term][$lang])) {
		if ($params) {
			return xinjiang_sprintf_array($xinjiang_translations[$term][$lang], $params);
		} else {
			return $xinjiang_translations[$term][$lang];
		}
	}
	return '*** NO TRANSLATION FOR [' . $term . ']***';
}

function xinjiang_translate_field($field) {
	return $field[LANG];
}
