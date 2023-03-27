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
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $view = new View("views/recherchearticle");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        return $view;
    }

    public function recherche() {
        $recherche = htmlspecialchars(HttpHelper::getParam('recherche'));
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $resultat = $this->articlesService->getArticles($recherche, $apiUrl, $apiKey);
        $view = new View("views/recherchearticle");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('resultat', $resultat);
        $view->setVar('recherche', $recherche);
        return $view;
    }
}