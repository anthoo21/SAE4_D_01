<?php 
namespace controllers;

use services\LoginService;
use yasmf\HttpHelper;
use yasmf\View;

class HomeController {

    private $loginService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct()
    {
        $this->loginService = LoginService::getDefaultService();
    }

    /**
     * @return View
     *  the view in charge of displaying the form to log in 
     */
    public function index() {
        $view = new View('sae4d-01-dolistats/views/connexion');
        return $view;
    }

    public function connexion() {
        $login = htmlspecialchars(HttpHelper::getParam('login'));
        $password = htmlspecialchars(HttpHelper::getParam('password'));
        $codeHttp = "a";
        $resultat = $this->loginService->getUser($login, $password);
        $articles = $this->loginService->getArticles();
        if(isset($resultat)) {
            $view = new View('sae4d-01-dolistats/views/recherchearticle');
            $view->setVar('resultat', $resultat);
            $view->setVar('articles', $articles);
        } else {
            $view = new View('sae4d-01-dolistats/views/connexion');
            $view->setVar('codeHttp', $codeHttp);
        }
        return $view;
    }

}