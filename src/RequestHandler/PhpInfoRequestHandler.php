<?php

declare(strict_types=1);

/**
 * This file is part of mentordosnerds/phpinfo.
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE.
 *
 * @link      https://github.com/mentordosnerds/phpinfo
 * @copyright Copyright (c) 2024 Felipe Sayão Lobato Abreu <github@mentordosnerds.com>
 * @license   https://opensource.org/licenses/MIT MIT License
 */

namespace MentorDosNerds\PhpInfo\RequestHandler;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class PhpInfoRequestHandler implements RequestHandlerInterface
{
    private ResponseFactoryInterface $responseFactory;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $phpInfo = $this->getResponseBody();

        $response = $this->responseFactory->createResponse();
        $response->getBody()->write($phpInfo);

        return $response;
    }

    private function getResponseBody(): string
    {
        ob_start();
        phpinfo();

        return ob_get_clean();
    }
}
