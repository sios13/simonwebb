<?php

/**
 * SIMOX - PHP MVC Framework
 */

define( "SIMOX_START", microtime(true) );

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

use Simox\DI;
use Simox\Simox;
use Simox\Loader;
use Simox\Url;
use Simox\View;
use Simox\Router;
use Simox\Dispatcher;
use Simox\Events\Manager as EventsManager;

try {
    require( __DIR__ . "/../vendor/autoload.php" );

    $di = new DI();

    $di->set( "loader", function() {
        $loader = new Loader();

        $loader->registerDirs( array(
            "app/controllers",
            "app/models",
            "app/plugins"
        ) );

        return $loader;
    } );

    $di->set( "url", function() {
        $url = new Url();
        $url->setUriPrefix( "/simonwebb" );
        return $url;
	} );

    $di->set( "router", function() {
        $router = new Router();
        $router->addRoute( "/", "IndexController#indexAction" );
        $router->addRoute( "/project/monstergame", "ProjectController#monstergameAction" );
        $router->addRoute( "/project/webdesktop", "ProjectController#webdesktopAction" );
        $router->addRoute( "/project/simox", "ProjectController#simoxAction" );
        $router->addRoute( "/project/simoxbook", "ProjectController#simoxbookAction" );
        $router->addRoute( "/project/konstochbruksglasforeningen", "ProjectController#konstochbruksglasforeningenAction" );
        $router->addRoute( "/project/rentalmovies", "ProjectController#rentalmoviesAction" );
        //$router->addRoute( "/project/simox/{param}", function($param) {$this->view->setMainView("default"); echo "HEJ " . $param;} );
        return $router;
    } );

    $di->set( "database", function() {
        $connection = new SqliteConnection(array(
            "db_name" => "db.db"
        ));
        return $connection;
    } );

	$di->set( "dispatcher", function() {
        $events_manager = new EventsManager();

        $events_manager->attach( "dispatch:beforeException", function($dispatcher, $params) {
            $exception = $params["exception"];
            switch ( $exception->getCode() )
            {
                case Dispatcher::EXCEPTION_CONTROLLER_NOT_FOUND:
                case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                    $dispatcher->forward( array(
                        "controller" => "index",
                        "action" => "notFound"
                    ) );
                    return false;
            }
            return true;
        } );

        $dispatcher = new Dispatcher();
        $dispatcher->setEventsManager( $events_manager );

        return $dispatcher;
	} );

    $simonwebb = new Simox( $di );

    echo $simonwebb->handle()->getContent();

} catch( \Exception $e ) {
    echo "SimoxException: ", $e->getMessage();
}

// echo "Time to run: " . (microtime(true) - SIMOX_START);
