<?php
/**
 * helper pro formatovaání měny 
 * 
 */
class Helpers
{
    public static function isk($value)
    {
        return str_replace(" ", "\xc2\xa0", number_format($value, 0, "", " ")) . "\xc2\xa0ISK";
    }
    public static function lp($value)
    {
        return str_replace(" ", "\xc2\xa0", number_format($value, 0, "", " ")) . "\xc2\xa0LP";
    }
}