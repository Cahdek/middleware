<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomePageHandler extends AbstractHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = [];

        return new JsonResponse([
            'welcome' => 'Congratulations! You have installed the mezzio skeleton application.',
            'docsUrl' => 'https://docs.mezzio.dev/mezzio/',
        ] + $data);
    }
}
