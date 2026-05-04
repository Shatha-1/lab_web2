<?php

function countWords($sentence) {
    $numberOfWords = str_word_count($sentence);
    return "The number of words in the string is " . $numberOfWords . " words.";
}

?>