<?php 

namespace controllers;


use services\LoginService;
use yasmf\HttpHelper;
use yasmf\View;

class HomeController
{

    private $loginService;

    /**
     * Create and initialize an LoginController object
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        return new View("views/choixUrl");
    }

    public function urlRecup() {
        $apiUrl = HttpHelper::getParam('urlUtil');
        $view = new View("views/connexion");
        $view->setVar('apiUrl',$apiUrl);
        return $view;
    }

    public function deconnexion() {
        $view = new View("views/choixUrl");
        return $view;
    }

    public function connexion() {
        $login = htmlspecialchars(HttpHelper::getParam('login'));
        $password = htmlspecialchars(HttpHelper::getParam('password'));
        $apiUrl = htmlspecialchars(HttpHelper::getParam('apiUrl'));
        $codeHttp = "a";
        $resultat = $this->loginService->getUser($login, $password, $apiUrl);
        if(isset($resultat)) {
            $view = new View('views/accueil');
            $view->setVar('apiUrl', $apiUrl);
            $view->setVar('resultat', $resultat);
        } else {
            $view = new View('views/connexion');
            $view->setVar('codeHttp', $codeHttp);
            $view->setVar('apiUrl', $apiUrl);
        }
        return $view;
    }

    public function retourUrl() {
        return new View('views/choixUrl');
    }

}
