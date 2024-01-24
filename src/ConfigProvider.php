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

namespace MentorDosNerds\PhpInfo;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => $this->getFactories(),
            ],
        ];
    }

    /**
     * @return string[]
     */
    public function getFactories(): array
    {
        return [
            RequestHandler\PhpInfoRequestHandler::class => Factory\PhpInfoRequestHandlerFactory::class,
        ];
    }
}
