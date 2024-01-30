<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model\Request;

use Symfony\Component\Serializer\Attribute\SerializedPath;

final readonly class GetAddressListsRequest
{
    public function __construct(
        public string|null $search = null,
        #[SerializedPath('[order][@dir]')]
        public string $order = 'ASC',
    ) {
    }
}
