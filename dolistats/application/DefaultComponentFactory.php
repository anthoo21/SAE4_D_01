<?php
/*
 * yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2023   Franck SILVESTRE
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Affero General Public License as published
 *     by the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU Affero General Public License for more details.
 *
 *     You should have received a copy of the GNU Affero General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace application;

use controllers\HomeController;
use controllers\ArticlesController;
use controllers\ClientsController;
use controllers\FacturesController;
use services\LoginService;
use services\ArticlesService;
use services\ClientsService;
use services\FacturesService;
use yasmf\ComponentFactory;
use yasmf\NoControllerAvailableForName;
use yasmf\NoServiceAvailableForName;

require("services/LoginService.php");
require("services/ArticlesService.php");
require("services/ClientsService.php");
require("services/FacturesService.php");
/**
 *  The controller factory
 */
class DefaultComponentFactory implements ComponentFactory
{


    private ?LoginService $loginService = null;
    private ?ArticlesService $articlesService = null;
    private ?ClientsService $clientsService = null;
    private ?FacturesService $facturesService = null;

    /**
     * @param string $controller_name the name of the controller to instanciate
     * @return mixed the controller
     * @throws NoControllerAvailableForName when controller is not found
     */
    public function buildControllerByName(string $controller_name): mixed {
        return match ($controller_name) {
            "Home" => $this->buildHomeController(),
            "Articles" => $this->buildArticlesController(),
            "Clients" => $this->buildClientsController(),
            "Factures" => $this->buildFacturesController(),
            default => throw new NoControllerAvailableForName($controller_name)
        };
    }

    public function buildServiceByName(string $service_name): mixed
    {
        return match($service_name) {
            "Login" => $this->buildLoginService(),
            "Articles" => $this->buildArticlesService(),
            "Clients" => $this->buildClientsService(),
            "Factures" => $this->buildFacturesService(),
            default => throw new NoServiceAvailableForName($service_name)
        };
    }

    /**
     * @return LoginService
     */
    private function buildLoginService(): LoginService
    {
        if ($this->loginService == null) {
            $this->loginService = new LoginService();
        }
        return $this->loginService;
    }

    /**
     * @return ArticlesService
     */
    private function buildArticlesService(): ArticlesService
    {
        if ($this->articlesService == null) {
            $this->articlesService = new ArticlesService();
        }
        return $this->articlesService;
    }

    /**
     * @return ClientsService
     */
    private function buildClientsService(): ClientsService
    {
        if ($this->clientsService == null) {
            $this->clientsService = new ClientsService();
        }
        return $this->clientsService;
    }

    /**
     * @return FacturesService
     */
    private function buildFacturesService(): FacturesService
    {
        if ($this->facturesService == null) {
            $this->facturesService = new FacturesService();
        }
        return $this->facturesService;
    }

    public function buildHomeController(): HomeController {
        return new HomeController($this->buildLoginService());
    }

    public function buildArticlesController(): ArticlesController {
        return new ArticlesController($this->buildArticlesService());
    }

    public function buildClientsController(): ClientsController {
        return new ClientsController($this->buildClientsService());
    }

    public function buildFacturesController(): FacturesController {
        return new FacturesController($this->buildFacturesService());
    }

}
