<?php

namespace Oaattia\Controller;


use Oaattia\Database\MySqlConnection;
use Oaattia\Repositories\CommentRepository;
use Oaattia\Repositories\PostRepository;

class CommentController extends BaseController
{
    /**
     * @var PostRepository
     */
    protected $commentRepo;


    /**
     * PostController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->commentRepo = new CommentRepository(new MySqlConnection());
    }


    /**
     * Save the comment
     */
    public function save()
    {
        // we should add here the validation be there is no time to do it

        if (!$_SESSION['is_logged_in']) {
            header('Location:'.'/');
            exit();
        }

        if (!empty($_POST['text'])) {
            $insert = $this->commentRepo->insert($_POST['text'], $_SESSION['user_id'], $_POST['post_id']);
            if ($insert) {
                $_SESSION['message'] = "Comment added";
            }

        }

        header('Location:'.'/post/show?post_id=' . $_POST['post_id']);
        exit();
    }

}