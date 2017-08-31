<?php


namespace Oaattia\Repositories;


class CommentRepository extends AbstractRepository implements Repository
{
    /**
     * find Column by
     *
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value)
    {
        $statement = $this->connection->prepare('SELECT * FROM comments WHERE '.$column.' = :'.$column.' LIMIT 1');

        $statement->bindValue(':'.$column, $value, \PDO::PARAM_STR);
        $statement->execute();

        $row = $statement->fetch(\PDO::FETCH_OBJ);

        return $row;
    }

    /**
     * Get the comments
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function get($limit = 5, $offset = 0)
    {
        $statement = $this->connection->prepare(
            "SELECT text FROM comments ORDER BY created_at DESC LIMIT :limit OFFSET :offset"
        );

        $statement->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }



    /**
     * @param $text
     * @param $userId
     * @param $postId
     *
     * @return mixed
     */
    public function insert($text, $userId, $postId)
    {
        $statement = $this->connection->prepare(
            "INSERT INTO comments(text, user_id, post_id, created_at, updated_at) VALUES(:text, :user_id, :post_id, NOW(), NOW())"
        );

        $statement->bindParam(':text', $text);
        $statement->bindParam(':user_id',$userId);
        $statement->bindParam(':post_id',$postId);

        return $statement->execute();

    }

}