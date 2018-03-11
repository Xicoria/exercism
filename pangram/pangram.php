<?php

function isPangram($word)
{
    $word = clean_word($word);

    if (count(unique_letters($word)) == 26) {
        return true;
    }

    return false;
}

function clean_word($word)
{
    $word = strtolower($word);
    return preg_replace('#[ \\\]#', '', $word);
}

function unique_letters($word)
{
    preg_match_all('/[a-z]/', $word, $matches);
    return array_unique($matches[0]);
}
