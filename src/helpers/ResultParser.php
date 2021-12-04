<?php

namespace App\helpers;


class ResultParser
{
    public static function parseResult($total)
    {
        printf('%s%s', $total, PHP_EOL);
    }
}
