<?php
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle) {
        return substr($haystack, 0, strlen($needle)) === $needle;        
    }
}

if (!function_exists('starts_with')) {
    function starts_with( $haystack, $needle ) {
         return substr( $haystack, 0, strlen( $needle ) ) === $needle;
    }
}