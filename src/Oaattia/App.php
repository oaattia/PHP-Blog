<?php

namespace Oaattia;


use Oaattia\Exceptions\NotFoundException;

class App
{
    
    /**
     * Should get the fetch the route from the url
     *
     * @param string $url
     *
     * @return array
     */
    public function handleUrl(string $url)
    {
        $uriPath = parse_url($url, PHP_URL_PATH);
        
        $uriSegments = explode('/', $uriPath);
        
        if (empty($uriSegments[1])) {
            return [ 'home', 'index' ]; // front-end of our blog
        }
        
        return [$uriSegments[1], $uriSegments[2]];
    }
    
    /**
     * find the right controller from the fetched controller and method from the url
     *
     * @param string $controller
     * @param string $method
     *
     * @return mixed
     * @throws NotFoundException
     */
    public function run(string $controller, string $method = 'index')
    {
        $namespace      = 'Oaattia\\Controller\\';
        $controllerName = ucfirst($controller) . 'Controller';
        
        if (is_file(realpath('../src/Oaattia/Controller/') . DIRECTORY_SEPARATOR . $controllerName . '.php')) {
            $controller = $namespace . $controllerName;
            $class  = new \ReflectionClass($controller);
            $method = $class->getMethod($method);
            return $method->invoke(new $controller(), null );
        } else {
            throw new NotFoundException('Controller not found');
        }
    }
    
}