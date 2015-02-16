<?php namespace Suggestotron\Controller;

/**
 * Handle error controller
 */
class Error
{
    
    /**
     * default error 
     *
     * @param array $options
     * @return void
     */
    public function indexAction($options)
    {
        header("HTTP/1.0 404 Not Found");

        $this->render("/errors/index.phtml", ['message' => "Page not found!"]);
    }
}
