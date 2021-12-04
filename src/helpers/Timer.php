<?php

namespace App\helpers;


class Timer
{
    public static $startTime;

    public static function start()
    {
        self::$startTime = \microtime(true);
    }

    public static function lap()
    {
        printf('Time taken: %.0f%s', (\microtime(true) - self::$startTime)*1e6, PHP_EOL);
    }

    public static function finish()
    {
        printf('Time: %.0f%s', (\microtime(true) - self::$startTime)*1e6, PHP_EOL);
        $startTime = null;
    }
}
