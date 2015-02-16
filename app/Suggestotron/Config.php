<?php namespace Suggestotron;

/**
 * Config 
 */
class Config
{
    static public $directory;

    static public $config = [];

    /**
     * set directory
     *
     * @param string $path
     * @return void
     */
    static public function setDirectory($path)
    {
        self::$directory = $path;
    }

    /**
    *  get config 
    *
    *  @param string $config
    *  @return string
    */
    static public function get($config)
    {
        $config = strtolower($config);

        self::$config[$config] = require self::$directory . '/' . $config . '.php';

        return self::$config[$config];
    }
}
