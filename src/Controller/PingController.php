<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PingController
 * @package App\Controller
 */
final class PingController extends AbstractController
{
    private $logger;

    /**
     * PingController constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/ping", name="app_ping")
     */
    public function ping(): Response
    {
        $this->logger->info(__METHOD__);
        return new Response(
            'pong',
            Response::HTTP_OK,
            ['Content-Type' => 'text/plain']
        );
    }
}
