<?php

/**
 * @see       https://github.com/mezzio/mezzio-swoole for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-swoole/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-swoole/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Swoole;

use Mezzio\ApplicationPipeline;
use Mezzio\Response\ServerRequestErrorResponseGenerator;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Swoole\Http\Server as SwooleHttpServer;

class RequestHandlerSwooleRunnerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerSwooleRunner
    {
        return new RequestHandlerSwooleRunner(
            $container->get(ApplicationPipeline::class),
            $container->get(ServerRequestInterface::class),
            $container->get(ServerRequestErrorResponseGenerator::class),
            $container->get(SwooleHttpServer::class)
        );
    }
}