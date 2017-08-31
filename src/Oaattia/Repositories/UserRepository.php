<?php

namespace Oaattia\Repositories;

class UserRepository extends AbstractRepository implements Repository
{
    
    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value)
    {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE '. $column .' = :'. $column .' LIMIT 1');
        
        $statement->bindValue(':'. $column, $value, \PDO::PARAM_STR);
        
        $statement->execute();
        
        $row = $statement->fetch(\PDO::FETCH_OBJ);
        
        return $row;
    }

    public function get($limit, $offset)
    {
        // TODO: Implement get() method.
    }
}