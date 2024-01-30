<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Customer
{
    #[SerializedName('@id')]
    public string $id;

    public string $name;
}
