<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class Account
{
    #[SerializedName('@id')]
    public int $id;

    public string $name;

    public string $type;

    /**
     * @var list<Customer>
     */
    #[SerializedPath('[customers][customer]')]
    public array $customers = [];
}
