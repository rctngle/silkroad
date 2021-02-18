<?php

define('ENGLISH', 'english');
define('CHINESE', 'chinese');
define('UYGHUR', 'uyghur');

$silkroad_languages = [ENGLISH, CHINESE, UYGHUR];
$silkroad_translations = silkroad_get_translations();
$lang = silkroad_get_current_language();
define('LANG', $lang);

function silkroad_sprintf_array($format, $arr) { 
	return call_user_func_array('sprintf', array_merge((array)$format, $arr)); 
} 

function silkroad_get_current_language() {
	global $silkroad_languages;
	if (isset($_GET['l']) && in_array($_GET['l'], $silkroad_languages)) {
		return $_GET['l'];
	}
	return ENGLISH;
}

function silkroad_get_languages() {
	global $silkroad_languages;

	$language_terms = get_terms('languages', [
		'hide_empty' => false,
	]);

	$languages = [];

	foreach($silkroad_languages as $silkroad_language) {
		$languages[$silkroad_language] = (object) [];
	}

	foreach($language_terms as $language_term) {

		if (in_array($language_term->slug, $silkroad_languages)) {
			$languages[$language_term->slug] = $language_term;
		}
	}

	return $languages;

}

function silkroad_get_translations() {
	$translations = get_field('translations', 'options');
	$dictionary = [];

	foreach($translations as $translation) {
		$key = array_shift($translation);
		$dictionary[$key] = $translation;
	}

	return $dictionary;
}

function silkroad_translate($term, $lang = LANG, $params = false) {
	global $silkroad_translations;

	
	if (isset($silkroad_translations[$term][$lang])) {
		if ($params) {
			return silkroad_sprintf_array($silkroad_translations[$term][$lang], $params);
		} else {
			return $silkroad_translations[$term][$lang];
		}
	}
	return '*** NO TRANSLATION FOR [' . $term . ']***';
}

function silkroad_translate_field($field) {
	return $field[LANG];
}
