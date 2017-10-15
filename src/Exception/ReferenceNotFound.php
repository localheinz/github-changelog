<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @link https://github.com/localheinz/github-changelog
 */

namespace Localheinz\GitHub\ChangeLog\Exception;

final class ReferenceNotFound extends \RuntimeException implements ExceptionInterface
{
    public static function fromOwnerNameAndReference(string $owner, string $name, string $reference): self
    {
        return new self(\sprintf(
            'Could not find reference "%s" in "%s/%s".',
            $reference,
            $owner,
            $name
        ));
    }
}
