<?php

namespace GSRO\Multilanguage\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TextMultilanguageMiddleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        // @todo: implement twig integration
        return $response;
    }
}
