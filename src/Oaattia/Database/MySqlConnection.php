<?php

namespace Oaattia\Database;


use PDO;

class MySqlConnection implements Connection
{
    /**
     * Set the connection
     *
     * @return mixed
     */
    public function set()
    {
        return new PDO(
            "mysql:host=".SERVER.";dbname=".DATABASE."",
            USERNAME,
            PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }


}