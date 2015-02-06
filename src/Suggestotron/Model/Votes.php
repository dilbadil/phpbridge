<?php namespace Suggestotron\Model;

class Votes
{
    /**
     * Add vote to Topics
     * 
     * @param int $topicId
     * @return void 
     */
    public function addVote($topicId)
    {
        $sql = "UPDATE votes
            SET
                count = count + 1
            WHERE
                topic_id = :id           
        ";

        $query = Db::getInstance()->prepare($sql);

        $data = [
            ':id' => $topicId
        ];

        return $query->execute($data);
    }
}
