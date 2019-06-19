<?php

namespace Controller;
class HomeController
{

    public function getHome()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/View/home.php';
    }
	public function getProjectHome()
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/View/project/projectHome.php';
    }

}
