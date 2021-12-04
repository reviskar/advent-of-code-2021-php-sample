<?php

namespace App\helpers;

class InputFileReader
{
    public static function readFile(string $fileName): \Generator
    {
        if (isset($_SERVER['argv']) && !empty($_SERVER['argv'][1])) {
            if (is_file($_SERVER['argv'][1])) {
                $fileName = $_SERVER['argv'][1];
            }
        }

        $fp = fopen($fileName, 'rb');

        while (($line = fgets($fp)) !== false){
            yield rtrim($line, "\r\n");
        }

        fclose($fp);
    }
}
