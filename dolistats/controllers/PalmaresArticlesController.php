<?php 

namespace controllers;


use services\PalmaresArticlesService;
use yasmf\HttpHelper;
use yasmf\View;

class PalmaresArticlesController
{

    private $palmaresArticlesService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct(PalmaresArticlesService $palmaresArticlesService)
    {
        $this->palmaresArticlesService = $palmaresArticlesService;
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
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $resultat = $this->palmaresArticlesService->getArticles($apiUrl, $apiKey);
        $view = new View("views/palmaresarticle");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('resultat', $resultat);
        return $view;
    }
}