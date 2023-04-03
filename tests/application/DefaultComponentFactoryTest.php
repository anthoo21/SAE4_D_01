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
use controllers\PalmaresArticlesController;
use controllers\palmaresClientController;
use controllers\ClientsController;
use controllers\FacturesController;
use services\LoginService;
use services\ArticlesService;
use services\ClientsService;
use services\FacturesService;
use services\PalmaresArticlesService;
use services\palmaresClientService;
use PHPUnit\Framework\TestCase;
use yasmf\NoControllerAvailableForName;
use yasmf\NoServiceAvailableForName;

require("services/LoginService.php");
require("services/ArticlesService.php");
require("services/PalmaresArticlesService.php");
require("services/palmaresClientService.php");
require("services/ClientsService.php");
require("services/FacturesService.php");

class DefaultComponentFactoryTest extends TestCase
{

    private DefaultComponentFactory $componentFactory;

    public function setUp(): void
    {
        parent::setUp();
        // given a component factory
        $this->componentFactory = new DefaultComponentFactory();
    }

    public function testBuildControllerByName_Home()
    {
        // when ask for home controller
        $controller = $this->componentFactory->buildControllerByName("Home");
        // then the controller is HomeController instance
        self::assertInstanceOf(HomeController::class,$controller);
    }

    public function testBuildControllerByName_Articles()
    {
        // when ask for home controller
        $controller = $this->componentFactory->buildControllerByName("Articles");
        // then the controller is HomeController instance
        self::assertInstanceOf(ArticlesController::class,$controller);
    }

    public function testBuildControllerByName_PalmaresArticles()
    {
        // when ask for home controller
        $controller = $this->componentFactory->buildControllerByName("PalmaresArticles");
        // then the controller is HomeController instance
        self::assertInstanceOf(PalmaresArticlesController::class,$controller);
    }

    public function testBuildControllerByName_palmaresClients()
    {
        // when ask for home controller
        $controller = $this->componentFactory->buildControllerByName("palmaresClients");
        // then the controller is HomeController instance
        self::assertInstanceOf(palmaresClientsController::class,$controller);
    }

    public function testBuildControllerByName_Factures()
    {
        // when ask for home controller
        $controller = $this->componentFactory->buildControllerByName("Factures");
        // then the controller is HomeController instance
        self::assertInstanceOf(FacturesController::class,$controller);
    }

    public function testBuildControllerByName_Other()
    {
        // expected exception when ask for a non-existant controller
        $this->expectException(NoControllerAvailableForName::class);
        $controller = $this->componentFactory->buildControllerByName("NoController");
    }

    public function testBuildServiceByName_Login()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("Login");
        // then the service is LoginService instance
        self::assertInstanceOf(LoginService::class,$service);
    }

    public function testBuildServiceByName_Articles()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("Articles");
        // then the service is ArticlesService instance
        self::assertInstanceOf(ArticlesService::class,$service);
    }

    public function testBuildServiceByName_Clients()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("Clients");
        // then the service is ClientsService instance
        self::assertInstanceOf(ClientsService::class,$service);
    }

    public function testBuildServiceByName_Factures()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("Factures");
        // then the service is FacturesService instance
        self::assertInstanceOf(FacturesService::class,$service);
    }

    public function testBuildServiceByName_PalmaresArticles()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("PalmaresArticles");
        // then the service is PalmaresArticlesService instance
        self::assertInstanceOf(PalmaresArticlesService::class,$service);
    }

    public function testBuildServiceByName_palmaresClients()
    {
        // when ask for user service
        $service = $this->componentFactory->buildServiceByName("palmaresClients");
        // then the service is palmaresClientsService instance
        self::assertInstanceOf(palmaresClientsService::class,$service);
    }

    public function testBuildServiceByName_Other()
    {
        // expected exception when ask for a non-existant service
        $this->expectException(NoServiceAvailableForName::class);
        $this->componentFactory->buildServiceByName("NoService");
    }
}