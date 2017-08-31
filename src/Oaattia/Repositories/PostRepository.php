<?php


namespace Oaattia\Repositories;


class PostRepository extends AbstractRepository implements Repository
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
        $statement = $this->connection->prepare('SELECT * FROM posts WHERE '.$column.' = :'.$column.' LIMIT 1');

        $statement->bindValue(':'.$column, $value, \PDO::PARAM_STR);
        $statement->execute();

        $row = $statement->fetch(\PDO::FETCH_OBJ);

        return $row;
    }

    /**
     * Find by id
     *
     * @param $value
     * @return mixed
     */
    public function findById($value)
    {
        $statement = $this->connection->prepare(
            'SELECT posts.id, title, content, name, created_at, updated_at FROM posts LEFT JOIN users ON (posts.user_id=users.id) WHERE posts.id = :id LIMIT 1'
        );

        $statement->bindValue(':id', $value, \PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(\PDO::FETCH_OBJ);

        return $row;
    }


    /**
     * Get all related comments
     *
     * @param $postId
     * @return mixed
     */
    public function getRelatedComments($postId)
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM comments LEFT JOIN users ON (comments.user_id=users.id) WHERE comments.post_id = :post_id ORDER BY created_at DESC'
        );

        $statement->bindValue(':post_id', $postId, \PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetchAll(\PDO::FETCH_OBJ);

        return $row;
    }

    /**
     * Insert row to the table
     *
     * @param $title
     * @param $content
     * @param $userId
     */
    public function insert($title, $content, $userId)
    {
        $statement = $this->connection->prepare(
            "INSERT INTO posts(title, content, user_id, created_at, updated_at) VALUES(:title, :content, :user_id, NOW(), NOW())"
        );

        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':user_id', $userId);

        return $statement->execute();

    }

    /**
     * Get the posts
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function get($limit = 5, $offset = 0)
    {
        $statement = $this->connection->prepare(
            "SELECT posts.id, title, content, name, created_at, updated_at FROM posts LEFT JOIN users ON (posts.user_id=users.id)  ORDER BY created_at DESC LIMIT :limit OFFSET :offset"
        );

        $statement->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}