<?php
// Source: https://gist.github.com/hedii/d96465fc999116e038f7
// Author: hedii [https://github.com/hedii]
/**
 * Given a string $haystack, search if it contains the string $needle and return
 * true or false. Return false if $haystack or $needle is empty.
 *
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
if (!function_exists('contains')) {
    function contains($haystack, $needle)
    {
        if (!empty($haystack) && !empty($needle)) {
            if (strpos($haystack, $needle) !== false) {
                // $needle was found in $haystack, return true
                return true;
            }
            return false;
        }
        return false;
    }
}

/**
 * Given a string $haystack, search if $haystack starts with the string $needle
 * and return true or false. Return false if $haystack or $needle is empty.
 *
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
if (!function_exists('startsWith')) {
    function startsWith($haystack, $needle)
    {
        if (!empty($haystack) && !empty($needle)) {
            // search backwards starting from haystack length characters from the end
            return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
        }
        return false;
    }
}

/**
 * Given a string $haystack, search if $haystack ends with the string $needle
 * and return true or false. Return false if $haystack or $needle is empty.
 *
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
if (!function_exists('endsWith')) {
    function endsWith($haystack, $needle)
    {
        if (!empty($haystack) && !empty($needle)) {
            // search forward starting from end minus needle length characters
            return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle,
                    $temp) !== false);
        }
        return false;
    }
}

/**
 * Given a string $haystack, remove everything before $delimiter ($delimiter
 * including) and return the string before $delimiter or return false if
 * $delimiter is not found in $haystack. Return false if $haystack or $delimiter
 * is empty. Return false if $haystack does not contains $delimiter.
 *
 * @param string $haystack
 * @param string $delimiter
 * @return mixed string or false
 */
if (!function_exists('getStringBefore')) {
    function getStringBefore($haystack, $delimiter)
    {
        if (!empty($haystack) && !empty($delimiter)) {
            if (strpos($haystack, $delimiter) !== false) {
                // separate $haystack in two strings and put each string in an array
                $filter = explode($delimiter, $haystack);
                if (isset($filter[0])) {
                    // return the string before $delimiter
                    return $filter[0];
                }
                return false;
            }
            return false;
        }
        return false;
    }
}

/**
 * Given a string $haystack, remove everything before $delimiter1 ($delimiter1
 * including), and remove everything after $delimiter2 ($delimiter2 including).
 * Return the string between $delimiter1 and $delimiter2 or return false if
 * $delimiter1 or $delimiter2 is not found in $haystack.  Return false if
 * $haystack or $delimiter1 or $delimiter2 is empty. Return false if
 * $haystack does not contains $delimiter1 and $delimiter2.
 *
 * @param string $haystack
 * @param string $delimiter1
 * @param string $delimiter2
 * @return mixed string or false
 */
if (!function_exists('getStringBetween')) {
    function getStringBetween($haystack, $delimiter1, $delimiter2)
    {
        if (!empty($haystack) && !empty($delimiter1) && !empty($delimiter2)) {
            if (strpos($haystack, $delimiter1) !== false && strpos($haystack, $delimiter2) !== false) {
                // separate $haystack in two strings and put each string in an array
                $pre_filter = explode($delimiter1, $haystack);
                if (isset($pre_filter[1])) {
                    // remove everything after the $delimiter2 in the second line of the
                    // $pre_filter[] array
                    $post_filter = explode($delimiter2, $pre_filter[1]);
                    if (isset($post_filter[0])) {
                        // return the string between $delimiter1 and $delimiter2
                        return $post_filter[0];
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }
}

/**
 * Given a string $haystack, remove everything before $delimiter ($delimiter
 * including) and return the string after $delimiter or return false if
 * $delimiter is not found in $haystack.  Return false if $haystack or
 * $delimiter is empty. Return false if $haystack does not contains $delimiter.
 *
 * @param string $haystack
 * @param string $delimiter
 * @return mixed string or false
 */
if (!function_exists('getStringAfter')) {
    function getStringAfter($haystack, $delimiter)
    {
        if (!empty($haystack) && !empty($delimiter)) {
            if (strpos($haystack, $delimiter) !== false) {
                // separate $haystack in two strings and put each string in an array
                $filter = explode($delimiter, $haystack);
                if (isset($filter[1])) {
                    // return the string after $delimiter
                    return $filter[1];
                }
                return false;
            }
            return false;
        }
        return false;
    }
}

/**
 * Given a string haystack, remove every occurrence of the string $needle in
 * $haystack and return the result string. Return false if $haystack or
 * $needle is empty. Return false if $haystack does not contains $needle.
 *
 * @param string $haystack
 * @param string $needle
 * @return mixed string or false
 */
if (!function_exists('getStringWithout')) {
    function getStringWithout($haystack, $needle)
    {
        if (!empty($haystack) && !empty($needle)) {
            if (strpos($haystack, $needle) !== false) {
                return str_replace($needle, '', $haystack);
            }
            return false;
        }
        return false;
    }
}