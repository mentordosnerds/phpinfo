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

namespace MentorDosNerds\PhpInfo\ServiceProvider;

use Interop\Container\ServiceProviderInterface;
use MentorDosNerds\PhpInfo\ConfigProvider;

final class PhpInfoServiceProvider implements ServiceProviderInterface
{
    private ConfigProvider $configProvider;

    public function __construct()
    {
        $this->configProvider = new ConfigProvider();
    }

    public function getFactories()
    {
        return array_map(
            static fn (string $factory) => new $factory(),
            $this->configProvider->getFactories()
        );
    }

    public function getExtensions()
    {
        return [];
    }
}
