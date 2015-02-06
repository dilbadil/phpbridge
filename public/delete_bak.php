<?php 

if (! isset($_GET['id']) || empty($_GET['id'])) {
    die ("You did not pass in an ID");
}

$data = new \Suggestotron\TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false)
    die ("Topic not found");

if ($data->delete($_GET['id']))
    header("location: /index.php");
else
    echo "An error occured";

exit;
