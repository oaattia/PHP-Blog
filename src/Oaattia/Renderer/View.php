<?php

namespace Oaattia\Renderer;


use Oaattia\Exceptions\NotFoundException;

class View
{
    /**
     * Get the right view
     *
     * @param string $viewName
     *
     * @param array $data
     * @throws NotFoundException
     */
    public static function get(string $viewName, array $data = [])
    {
        $fullPath = VIEW_PATH . '/' . $viewName . '.php';

        if (is_file($fullPath)) {
            require $fullPath;
        } else {
            throw new NotFoundException("View {$viewName} not found");
        }
    }
    
}