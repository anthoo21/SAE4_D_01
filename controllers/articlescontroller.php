<?php 
namespace controllers;

use services\ArticlesService;
use yasmf\HttpHelper;
use yasmf\View;

class ArticlesController {

    private $articlesService;

    /**
     * Create and initialize an ArticlesController object
     */
    public function __construct()
    {
        $this->articlesService = ArticlesService::getDefaultService();
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
        $recherche = htmlspecialchars(HttpHelper::getParam('recherche'));
        $resultatRecherche = $this->articlesService->searchArticles($recherche);
        $view = new View('sae4d-01-dolistats/views/recherchearticle');
        $view->setVar('resultatRecherche', $resultatRecherche);
        return $view;
    }

}