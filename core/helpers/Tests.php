<?php

namespace Core\Helpers;

trait Tests
{

    protected static function test_file_exists($file)
    {
        try {
            if (!file_exists($file)) {
                throw new \Exception("The following file was not found: $file");
            }
        } catch (\Exception $error) {
            echo $error->getMessage();

            die;
        }

        return true;
    }
}
