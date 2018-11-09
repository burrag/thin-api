<?php

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * @author Marek Humpolik <marek.humpolik@inspire.cz>
 */
class TestHandler
{
    public function get(): ResponseInterface
    {
        return new JsonResponse(['test' => true]);
    }
}
