<?php

function encode($input)
{
    if (strlen($input) == 0) {
        return "";
    }

    if (strlen($input) == 1) {
        return $input;
    }

    $count = 1;
    $result = '';
    $previous_match = $input[0];
    for ($i = 1; $i < strlen($input); $i++) {
        if ($input[$i] == $previous_match) {
            $count++;
        } else {
            if ($count > 1) {
                $result .= $count;
            }
            $result .= $previous_match;
            $previous_match = $input[$i];
            $count = 1;
        }
    }

    if ($count > 1) {
        $result .= $count;
    }
    $result .= $previous_match;

    return $result;
}

function decode($input)
{
    if (strlen($input) == 0) {
        return "";
    }

    if (strlen($input) == 1) {
        return $input;
    }

    $result = '';
    for ($i = 0; $i < strlen($input); $i++) {
        if (preg_match('/[A-Za-z ]/', $input[$i])) {
            $result .= $input[$i];
        } else {
            $repeat = '';
            do {
                $repeat .= $input[$i];
            } while (!preg_match('/[A-Za-z ]/', $input[++$i]));
            $result .= str_repeat($input[$i], $repeat);
        }
    }
    
    return $result;
}
