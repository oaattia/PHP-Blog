<?php

namespace Oaattia\Controller;


class BaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        // Enable PHP Session
        if (empty($_SESSION))
            @session_start();
        
    }
}