<?php

namespace Oaattia\Controller;


use Oaattia\Database\MySqlConnection;
use Oaattia\Renderer\View;
use Oaattia\Repositories\PostRepository;

class PostController extends BaseController
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
     * the create view for the post
     */
    public function create()
    {
        return View::get('post_create');
    }

    /**
     * Save the post
     */
    public function save()
    {
        // we should add here the validation be there is no time to do it

        if (!$_SESSION['is_logged_in']) {
            header('Location:'.'/post/create');
            exit();
        }

        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $insert = $this->postRepo->insert($_POST['title'], $_POST['content'], $_SESSION['user_id']);
            if ($insert) {
                $_SESSION['message'] = "Post inserted";
            }
        }

        header('Location:'.'/post/create');
        exit();
    }

    /**
     * Show single post
     */
    public function show()
    {
        if (!isset($_GET['post_id']) || empty($_GET['post_id'])) {
            header('Location:'.'/');
            exit();
        }

        $postId = (string)$_GET['post_id'];

        $post = $this->postRepo->findById($postId);

        if(!empty($post->id)) {
            $comments = $this->postRepo->getRelatedComments($postId);
        }
        if (!$post) {
            $_SESSION['message'] = "No post found with this id";
            header('Location:'.'/');
            exit();
        }

        // then we got a post
        return View::get('post_single', [$post, $comments]);

    }
}