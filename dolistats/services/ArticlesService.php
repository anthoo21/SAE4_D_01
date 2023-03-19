<?php
namespace services;



class ArticlesService {

    public static function getUser($login, $password, $apiUrl) {
	
    }

    



    private static $defaultService;
    /**
     * @return mixed
     *  the default instance of ArticlesService used by controllers
     */
    public static function getDefaultService()
    {
        if (ArticlesService::$defaultService == null) {
            ArticlesService::$defaultService = new ArticlesService();
        }
        return ArticlesService::$defaultService;
    }

}