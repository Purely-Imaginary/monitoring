<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        $number = phpinfo();
        xdebug_break();

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }
}
