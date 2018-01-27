<?php

namespace GSRO\Multilanguage\Middleware;

use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MultilanguageMiddleware
{
    /**
     * @var MultilanguageServiceInterface
     */
    protected $service;

    /**
     * MultilanguageMiddleware constructor.
     * @param MultilanguageServiceInterface $service
     */
    public function __construct(MultilanguageServiceInterface $service)
    {
        $this->service = $service;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $langCode = $request->getAttribute('multilanguage_language', 'en');
        $languageBlocks = $this->service->getAllBlocks($langCode);
        $request = $request->withAttribute('ml', $languageBlocks);
        return $next($request, $response);
    }
}
