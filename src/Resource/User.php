<?php

declare(strict_types=1);

/**
 * Copyright (c) 2016 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/github-changelog
 */

namespace Ergebnis\GitHub\Changelog\Resource;

final class User implements UserInterface
{
    /**
     * @var string
     */
    private $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function login(): string
    {
        return $this->login;
    }

    public function htmlUrl(): string
    {
        return \sprintf(
            'https://github.com/%s',
            $this->login
        );
    }
}
