<?php namespace Suggestotron\Controller;

/**
 * 
 */
class Votes
{
    
    /**
     * 
     */
    public function addAction($options)
    {
        if (! isset($options['id']) || empty($options['id']))
        {
            die("No topic id specified!");
        }

        $votes = new \Suggestotron\Model\Votes();
        $votes->addVote($options['id']);

        header("Location: /");
    }
}
