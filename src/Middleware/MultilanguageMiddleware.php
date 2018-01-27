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
    
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $requestedLanguage = $request->getQueryParams()['lang'] ?? 'en';
    
        if (!$this->service->hasLanguage($requestedLanguage)) {
            $requestedLanguage = $this->service->getDefaultLanguageCode();
        }
    
        $languageBlocks = $this->service->getAllBlocks($requestedLanguage);
        $request = $request->withAttribute('multilanguage', $languageBlocks);
        return $next($request, $response);
    }
}
