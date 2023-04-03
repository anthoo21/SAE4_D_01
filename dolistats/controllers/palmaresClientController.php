<?php 

namespace controllers;


use services\palmaresClientService;
use yasmf\HttpHelper;
use yasmf\View;

class palmaresClientController
{

    private $palmaresClientService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct(palmaresClientService $palmaresClientService)
    {
        $this->palmaresClientService = $palmaresClientService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $view = new View("views/palmaresclient");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        return $view;
    }

    public function palmares() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $resultat = $this->palmaresClientService->getArticles($apiUrl, $apiKey);
        $view = new View("views/palmaresclient");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('resultat', $resultat);
        return $view;
    }
}