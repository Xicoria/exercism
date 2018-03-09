<?php

class Bob
{
    public static function clearUTF($text)
    {
        $result = '';
        $converted_text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        for ($i = 0; $i < strlen($converted_text); $i++) {
            $character1 = $converted_text[$i];
            $character2 = mb_substr($converted_text, $i, 1);
            $result .= $character1 == '?' ? $character2 : $character1;
        }

        return $result;
    }

    public static function respondTo($speach)
    {
        $speach = self::clearUTF(trim($speach));

        $yelling = strtoupper($speach) == $speach;
        $questioning = preg_match('/.*\?$/', $speach);
        $alpha = preg_match('/[A-Z]/', strtoupper($speach));
        $number = preg_match('/[0-1]/', strtoupper($speach));

        if ($yelling && $questioning && $alpha) {
            return "Calm down, I know what I'm doing!";
        }
        if ($yelling && $alpha) {
            return 'Whoa, chill out!';
        }
        if ($questioning) {
            return 'Sure.';
        }
        if (!$alpha && !$number) {
            return 'Fine. Be that way!';
        }

        return 'Whatever.';
    }
}

