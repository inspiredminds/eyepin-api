<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

final readonly class AddressList
{
    public function __construct(
        #[SerializedName('@id')]
        public int $id,
        #[SerializedName('@externalid')]
        public string|null $externalid = null,
        public string|null $name = null,
        public int|null $count = null,
        public int|null $activity = null,
        #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'])]
        public \DateTimeInterface|null $created = null,
    ) {
    }
}
