<?php namespace Suggestotron\Controller;

class About extends \Suggestotron\Controller
{

    /**
     * Response of about page
     *
     * @return Response
     */
    public function indexAction()
    {
        $this->render("index/about", ['name' => 'Abdillah']);
    }
}
