<?php

class Dotenv
{
    /**
     * Load `.env` file in given directory
     */
    public static function load($path, $file = '.env')
    {
        if (!is_string($file)) {
            $file = '.env';
        }

        $filePath = rtrim($path, '/') . '/' . $file;
        if (!is_readable($filePath) || !is_file($filePath)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Dotenv: Environment file %s not found or not readable. " .
                    "Create file with your environment settings at %s",
                    $file,
                    $filePath
                )
            );
        }

        $EnvironmentVariables = static::getRequire($filePath);

        foreach ($EnvironmentVariables as $key => $value)
        {
            $_ENV[$key] = $value;

            $_SERVER[$key] = $value;

            putenv("{$key}={$value}");
        }

    }

    /**
     * Get the returned value of a file.
     *
     * @param  string  $path
     * @return mixed
     *
     * @throws FileNotFoundException
     */
    public static function getRequire($path)
    {
        if (file_exists($path)) return require $path;

        throw new FileNotFoundException("File does not exist at path {$path}");
    }
}


class FileNotFoundException extends \Exception {}