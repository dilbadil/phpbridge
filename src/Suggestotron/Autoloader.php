<?php namespace Suggestotron;

class Autoloader
{
    
    /**
     * load function
     */
    public function load($className)
    {
        $config = \Suggestotron\Config::get('autoload');

        $file = $config['class_path'] . '/'  . str_replace("\\", "/", $className) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }

    /**
     * register class 
     *
     * @return void
     * @author Me
     */
    public function register()
    {
        spl_autoload_register([$this, 'load']);
    }
}

$loader = new Autoloader();
$loader->register();
