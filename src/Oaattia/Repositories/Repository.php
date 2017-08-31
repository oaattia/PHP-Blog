<?php

namespace Oaattia\Repositories;


interface Repository
{
    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value);

    public function get($limit, $offset);
}