<?php
/**
 * Created by PhpStorm.
 * User: vulgaris
 * Date: 2/28/19
 * Time: 2:37 PM
 */
$arguments = $argv;
$tempus = array();
$dictionary = 'anagram-master-dictionnaire.txt';
array_shift($arguments);

if (empty($arguments)) {
    print("Enter word");
    return 0;
} else {


    $rez = implode($arguments);
    $str = $rez;
    $n = strlen($str);
    $permut = permute($str, 0, $n - 1);
    $permuta = implode($permut);

    print_r(is_anagram($rez, $permuta) . "\n");

    $handle = @fopen($dictionary, 'rb');
//    if ($handle) {
//        while (($line = fgets($handle)) !== false) {
//            //
////            if (strpos($line, $permuta) !== false) {
////                var_dump($permuta);
////            }
//        }
//        return true;
//
//    }
}


function permute($str, $i, $n)
{
    global $tempus;
    if ($i == $n) {
        var_dump($tempus);

    } else {
        for ($j = $i; $j < $n; $j++) {
            swap($str, $i, $j);
            permute($str, $i + 1, $n);
            swap($str, $i, $j);
            $tempus[$i] = $str;

        }


    }
    return $tempus;

}

function swap(&$str, $i, $j)
{
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}

function is_anagram($a, $b)
{
    if (count_chars($a, 1) == count_chars($b, 1)) {
        return "This two strings are anagrams";
    } else {
        return "This two strings are not anagrams";
    }
}
