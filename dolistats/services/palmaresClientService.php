<?php
namespace services;



class palmaresClientService {

    public static function getClients($apiUrl, $apiKey) {
        $apiUrl = $apiUrl."thirdparties?sortfield=t.rowid&sortorder=ASC&limit=100";
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $apiUrl);				// Url de l'API à appeler
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);			// Retour dans une chaine au lieu de l'afficher
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 		// Désactive test certificat
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        
        // Parametre pour le type de requete
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); 		// Type de requete GET
        
        // Si des données doivent être envoyées
        if (!empty($produitParam)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($produitParam));
            curl_setopt($curl, CURLOPT_POST, true);
        }
        
        $httpheader []= "Content-Type:application/json";
        
        if (!empty($apiKey)) {
            // Ajout de la clé API dans l'entete si elle existe (pour tous les appels sauf login)
            $httpheader = ['DOLAPIKEY: '.$apiKey];
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
        
        // A utiliser sur le réseau des PC IUT, pas en WIFI, pas sur une autre connexion
        // $proxy="http://cache.iut-rodez.fr:8080";
        // curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, true);
        // curl_setopt($curl, CURLOPT_PROXY,$proxy ) ;
        ///////////////////////////////////////////////////////////////////////////////
        
        $result = curl_exec($curl);								// Exécution
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);	// Récupération statut 
        
        curl_close($curl);	
        $resultat=json_decode($result,true);
        return $resultat;
    }
    
    public static function getFactures($apiUrl, $apiKey) {
        $apiUrl = $apiUrl."invoices?sortfield=t.total_ht&sortorder=DESC&limit=100";
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $apiUrl);				// Url de l'API à appeler
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);			// Retour dans une chaine au lieu de l'afficher
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 		// Désactive test certificat
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        
        // Parametre pour le type de requete
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); 		// Type de requete GET
        
        // Si des données doivent être envoyées
        if (!empty($produitParam)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($produitParam));
            curl_setopt($curl, CURLOPT_POST, true);
        }
        
        $httpheader []= "Content-Type:application/json";
        
        if (!empty($apiKey)) {
            // Ajout de la clé API dans l'entete si elle existe (pour tous les appels sauf login)
            $httpheader = ['DOLAPIKEY: '.$apiKey];
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
        
        // A utiliser sur le réseau des PC IUT, pas en WIFI, pas sur une autre connexion
        // $proxy="http://cache.iut-rodez.fr:8080";
        // curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, true);
        // curl_setopt($curl, CURLOPT_PROXY,$proxy ) ;
        ///////////////////////////////////////////////////////////////////////////////
        
        $result = curl_exec($curl);								// Exécution
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);	// Récupération statut 
        
        curl_close($curl);	
        $resultat=json_decode($result,true);
        return $resultat;
    }

    



    private static $defaultService;
    /**
     * @return mixed
     *  the default instance of palmaresClientService used by controllers
     */
    public static function getDefaultService()
    {
        if (palmaresClientService::$defaultService == null) {
            palmaresClientService::$defaultService = new palmaresClientService();
        }
        return palmaresClientService::$defaultService;
    }

}