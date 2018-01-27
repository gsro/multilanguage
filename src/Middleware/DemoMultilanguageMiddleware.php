<?php

namespace GSRO\Multilanguage\Middleware;

use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class DemoMultilanguageMiddleware implements RendererMiddlewareInterface
{
    /**
     * @var TemplateRendererInterface
     */
    protected $template;
    
    /**
     * DemoMultilanguageMiddleware constructor.
     * @param TemplateRendererInterface $template
     */
    public function __construct(TemplateRendererInterface $template, $options = array())
    {
        $this->template = $template;
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $data = [
            'ml' => $request->getAttribute('multilanguage', [])
        ];
        $response->getBody()->write($this->template->render('multilanguage::welcome', $data));
        return $response;
    }
}
