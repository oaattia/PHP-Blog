<?php

namespace Oaattia\Repositories;

use Oaattia\Database\Connection;

abstract class AbstractRepository
{
    /**
     * @var Connection
     */
    protected $connection;
    
    /**
     * constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection->set();
    }
}