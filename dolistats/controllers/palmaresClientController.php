<?php 

namespace controllers;


use services\palmaresClientService;
use services\FacturesService;
use yasmf\HttpHelper;
use yasmf\View;

class palmaresClientController
{

    private $palmaresClientService;
    private $factureClientService;

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
        $username = HttpHelper::getParam('username');
        $view = new View("views/palmaresclient");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('username', $username);
        return $view;
    }

    public function palmares() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $username = HttpHelper::getParam('username');
        $resultatCli = $this->palmaresClientService->getClients($apiUrl, $apiKey);
        $resultatFac= $this->palmaresClientService->getFactures($apiUrl, $apiKey);
        $view = new View("views/palmaresclient");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('username', $username);
        $view->setVar('resultatCli', $resultatCli);
        $view->setVar('resultatFac', $resultatFac);
        return $view;
    }
}