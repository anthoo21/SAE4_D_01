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
        $regex = '/^[1-9]|[1-9][0-9]$/';
        $input = HttpHelper::getParam('urlUtil');
        $error = "";
        if (preg_match($regex, $input)) {
            $apiUrl = "http://dolibarr.iut-rodez.fr/G2022-".$input."/htdocs/api/index.php/";
            $view = new View("views/connexion");
            $view->setVar('apiUrl',$apiUrl);
        } else {
            $view = new View("views/choixUrl");
            $view->setVar('error',$error);
        }
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

}
