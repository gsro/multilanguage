<?php

namespace GSRO\Multilanguage\Middleware;

use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

interface RendererMiddlewareInterface
{
    public function __construct(TemplateRendererInterface $template);
}
