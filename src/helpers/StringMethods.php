<?php

namespace Classes\Helpers;

class StringMethods
{

    static public function checkForSpecialChars($string): bool
    {
        return preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬\-\"]/", $string);
    }

    static public function checkForPolishChars($string): bool
    {
        return preg_match("/[ąęćłńóśżźĄĘĆŁŃÓŚŻŹ]/u", $string);
    }

    static public function isEmailPattern($string): bool
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL) ? true : false;
    }
    static public function removeLastCharacter(string $string): string
    {
        return substr($string, 0, -1);
    }
}
