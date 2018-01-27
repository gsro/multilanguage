<?php

namespace GSRO\Multilanguage\Middleware;

use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Stratigility\MiddlewareInterface;

class LanguageSelectorMiddleware
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
        $requestedLanguage = $request->getQueryParams()['lang'] ?? '';

        if (!$this->service->hasLanguage($requestedLanguage)) {
            $requestedLanguage = $this->service->getDefaultLanguageCode();
        }

        $request = $request->withAttribute('multilanguage_language', $language ?? 'en');
        return $next($request, $response);
    }
}
