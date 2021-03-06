<?php

use Simox\Controller;

class ProjectController extends Controller
{
    public function initialize()
    {
        $this->tag->prependTitle( " - ");
        $this->tag->appendTitle( "Projekt - simonwebb.se" );

        $this->view->setMainView( "default" );
    }

    public function githubdashboardAction()
    {
        $this->tag->setTitle( "Github Dashboard" );
        $this->view->pick( "posts/githubdashboard" );
    }

    public function monstergameAction()
    {
        $this->tag->setTitle( "Monster game" );
        $this->view->pick( "posts/monstergame" );
    }

    public function webdesktopAction()
    {
        $this->tag->setTitle( "Web desktop" );
        $this->view->pick( "posts/webdesktop" );
    }

    public function millegardenAction()
    {
        $this->tag->setTitle( "Millegården" );
        $this->view->pick( "posts/millegarden" );
    }

    public function simoxAction()
    {
        $this->tag->setTitle( "Simox" );
        $this->view->pick( "posts/simox" );

        //$this->view->enableCache( array("key" => "project-simox-cache", "level" => 5) );
    }

    public function konstochbruksglasforeningenAction()
    {
        $this->tag->setTitle( "Konst- och Bruksglasföreningen" );
        $this->view->pick( "posts/konstochbruksglasforeningen" );
    }

    public function simoxbookAction()
    {
        $this->tag->setTitle( "Simoxbook" );
        $this->view->pick( "posts/simoxbook" );
    }
    
    public function rentalmoviesAction()
    {
        $this->tag->setTitle( "RentalMovies" );
        $this->view->pick( "posts/rentalmovies" );
    }
}
