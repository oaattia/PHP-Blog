<?php

namespace Oaattia\Controller;

use Oaattia\Renderer\View;

class ContactController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * the create view for the contact
     */
    public function send()
    {
        return View::get('contact_single');
    }


}