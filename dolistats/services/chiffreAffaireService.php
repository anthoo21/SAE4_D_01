<?php
namespace services;



class chiffreAffaireService {

    private static $defaultService;
    /**
     * @return mixed
     *  the default instance of chiffreAffaireService used by controllers
     */
    public static function getDefaultService()
    {
        if (chiffreAffaireService::$defaultService == null) {
            chiffreAffaireService::$defaultService = new chiffreAffaireService();
        }
        return chiffreAffaireService::$defaultService;
    }

}