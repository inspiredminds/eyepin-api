<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model\Request;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

final readonly class AddressListAddRequest
{
    public function __construct(
        #[SerializedName('@id')]
        public int $id,
        #[SerializedName('@externalid')]
        public string|null $externalid = null,
        #[SerializedPath('[addresses][@key]')]
        public string $key = 'email',
        /** @var list<string> */
        #[SerializedPath('[addresses][address]')]
        public array $addresses = [],
    ) {
    }
}
