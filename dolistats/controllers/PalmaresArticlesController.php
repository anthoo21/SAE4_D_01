<?php 

namespace controllers;


use services\PalmaresQuantiteService;
use yasmf\HttpHelper;
use yasmf\View;

class PalmaresArticlesController
{

    private $palmaresQuantiteService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct(PalmaresQuantiteService $palmaresQuantiteService)
    {
        $this->palmaresQuantiteService = $palmaresQuantiteService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $view = new View("views/palmaresarticle");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        return $view;
    }

    public function palmares() {
        //$recherche = htmlspecialchars(HttpHelper::getParam('recherche'));
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $resultat = $this->palmaresQuantiteService->getArticles($apiUrl, $apiKey);
        $view = new View("views/palmaresArticle");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('resultat', $resultat);
        //$view->setVar('recherche', $recherche);
        return $view;
    }
}