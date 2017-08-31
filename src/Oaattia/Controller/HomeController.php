<?php

namespace Oaattia\Controller;

use Oaattia\Database\MySqlConnection;
use Oaattia\Renderer\View;
use Oaattia\Repositories\PostRepository;

class HomeController extends BaseController
{
    /**
     * @var PostRepository
     */
    protected $postRepo;


    /**
     * PostController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->postRepo = new PostRepository(new MySqlConnection());
    }

    /**
     * Home page of the website
     */
    public function index()
    {
        $posts = $this->postRepo->get();

        View::get('home', $posts);
    }
}