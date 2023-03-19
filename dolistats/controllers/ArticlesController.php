<?php 

namespace controllers;


use services\ArticlesService;
use yasmf\HttpHelper;
use yasmf\View;

class ArticlesController
{

    private $articlesService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct(ArticlesService $articlesService)
    {
        $this->articlesService = $articlesService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        return new View("views/recherchearticle");
    }


}