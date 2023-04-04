<?php 

namespace controllers;


use services\chiffreAffaireService;
use yasmf\HttpHelper;
use yasmf\View;

class chiffreAffaireController
{

    private $chiffreAffaireService;

    /**
     * Create and initialize an ClientsController object
     */
    public function __construct(chiffreAffaireService $chiffreAffaireService)
    {
        $this->chiffreAffaireService = $chiffreAffaireService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $username = HttpHelper::getParam('username');
        $view = new View("views/comparaisonCA");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('username', $username);
        return $view;
    }

}