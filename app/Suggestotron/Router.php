<?php namespace Suggestotron;

class Router
{

    protected $config;
    
    /**
     * start 
     */
    public function start($route)
    {

        $this->config = \Suggestotron\Config::get('routes');

        if (empty($route) || $route == '/') {
            if (isset($this->config['default'])) {
                $route = $this->config['default'];
            } else {
                $this->error();
            }
        }

        try {
            foreach ($this->config['routes'] as $path => $defaults)
            {
                $regex = '@' . preg_replace(
                    '@:([\w]+)@',
                    '(?P<$1>[^/]+)',
                    str_replace(')', ')?', (string) $path)
                ) . '@';

                $matches = [];

                if (preg_match($regex, $route, $matches))
                {
                    $options = $defaults;

                    foreach ($matches as $key => $value)
                    {
                        if (is_numeric($key))
                            continue;
                        
                        $options[$key] = $value;

                        if (isset($defaults[$key])) {
                            if (strpos($defaults[$key], ":$key") !== false)
                                $options[$key] = str_replace(":$key", $value, $defaults[$key]);
                        }
                    }

                    if (isset($options['controller']) && isset($options['action']))
                    {
                        $callable = [$options['controller'], $options['action'] . 'Action'];

                        if (is_callable($callable)) 
                        {
                            $callable = [new $options['controller'], $options['action'] . 'Action'];
                            $callable($options);

                            return;
                        } else {
                            $this->error();
                        }
                    } else {
                        $this->error();
                    }
                }
            }
        } catch (\Suggestotron\Controller\Exception $e) {
            $this->error();
        }

        // If our route starts with a /, remove it
        // if ($route{0} == '/') {
        //     $route = substr($route, 1);
        // }
        //
        // $controller = new \Suggestotron\Controller\Topics();
        //
        // $method = [$controller, $route . 'Action'];
        //
        // if (is_callable($method))
        //     return $method();
        //
        // require 'error.php';
        //
        // $path = realpath('./' . $route . '.php');

        // if (file_exists($path))
        //     require $path;
        // else
        //     require 'error.php';
    }

    public function error()
    {
        if (isset($this->config['errors']))
        {
            $route = $this->config['errors'];
            $this->start($route);
        }
        else {
            echo "An unknown error occured, please try again!";
        }

        exit;
    }
}

