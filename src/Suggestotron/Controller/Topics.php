<?php namespace Suggestotron\Controller;

class Topics extends Controller
{
    /**
     * @var TopicData $data
     */
    protected $data;

    function __construct()
    {
        parent::__construct();
        $this->data = new \Suggestotron\TopicData();
    }
    
    /**
     * Get lists response
     * 
     * @return void
     */
    public function listAction()
    {

        $data = new \Suggestotron\TopicData();

        $topics = $data->getAllTopics();

        $this->render("index/list.phtml", ['topics' => $topics]);
    }
    
    /**
     * Add topic
     * 
     * @return void
     */
    public function addAction()
    {

        if (isset($_POST) && sizeof($_POST) > 0)
        {
            $this->data->add($_POST);
            header("location: /");
            exit;
        }

        $this->render("index/add.phtml");
        
    }
    
    /**
     * edit topic
     * 
     * @return void
     */
    public function editAction($options)
    {

        $data = $this->data;

        if (isset($_POST['id']) && ! empty($_POST['id']))
        {
            if ($data->update($_POST)) {
                header("location: /index.php");
                exit;
            } else {
                echo "An error occured";
                exit;
            }
        }

        if (! isset($options['id']) || empty($options['id']))
        {
            echo "You did not pass in an ID";
            exit;
        }

        $topic = $data->getTopic($options['id']);

        if ($topic === false)
        {
            echo "Topic not found";
            exit;
        }

        $this->render("index/edit.phtml", ['topic' => $topic]);
        
    }
    
    /**
     * delete topic
     * 
     * @return void
     */
    public function deleteAction($options)
    {

        if (! isset($options['id']) || empty($options['id'])) {
            die ("You did not pass in an ID");
        }

        $topic = $this->data->getTopic($options['id']);

        if ($topic === false)
            die ("Topic not found");

        if ($this->data->delete($options['id']))
            header("location: /index.php");
        else
            echo "An error occured";

        exit;
    }
}