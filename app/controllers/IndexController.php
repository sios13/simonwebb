<?php

use Simox\Controller;

class IndexController extends Controller
{
    public function initialize()
    {
        $this->tag->prependTitle( " - " );
        $this->tag->appendTitle( "simonwebb.se" );

        $this->view->setMainView( "default" );
    }

    public function indexAction()
    {
        $this->tag->setTitle( "Startsida" );
        $this->view->pick( "posts/index" );

        // $this->view->enableCache( [
        //     "key" => "index-cache",
        //     "lifetime" => 100,
        //     "level" => 5
        // ] );
    }

    public function notFoundAction()
    {
        $this->tag->setTitle( "Sidan finns inte" );
        $this->view->pick( "posts/404" );

        $this->response->setStatusCode( 404, "Not found" );
    }
}
