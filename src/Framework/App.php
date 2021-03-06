<?php
namespace Framework;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

Class App{
    public function run(\Psr\Http\Message\ServerRequestInterface $request):\Psr\Http\Message\ResponseInterface {
        $uri = $request->getUri()->getPath();
        if(!empty($uri) && $uri[-1] === "/"){
            $response = (new Response())
            ->withStatus(301)
            ->withHeader('Location',substr($uri, 0, -1));
            return $response;
        }
        if($uri === '/blog'){
            return new Response(200,[],'Welcome to our blog');
        }
        return new Response(404,[],'Error 404');
    }
    
}


?>