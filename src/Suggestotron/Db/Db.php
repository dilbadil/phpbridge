<?php namespace Suggestotron;

class Db
{
    /**
     * @var static $instance
     */
    static protected $instance = null;

    /**
     * @var PDO $connection
     */
    protected $connection = null;

    protected function __construct()
    {
        $config = \Suggestotron\Config::get('database');

        $this->connection = new \PDO("mysql:host=" . $config['dbhost'] . ";dbname=" . $config['dbname'], $config['dbuser'], $config['dbpassword']);
    }
    
    /**
     * Get connection 
     *
     * @return void
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Get instance 
     *
     * @return static
     */
    static public function getInstance()
    {
        if (! (static::$instance instanceof static))
        {
            static::$instance = new static();
        }

        return static::$instance->getConnection();
    }
}
