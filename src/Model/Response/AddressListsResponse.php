<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model\Response;

use InspiredMinds\EyepinApi\Model\AddressList;
use Symfony\Component\Serializer\Attribute\SerializedPath;

class AddressListsResponse extends AbstractResponse
{
    /**
     * @var list<AddressList>
     */
    #[SerializedPath('[data][addresslist]')]
    public array $addressLists = [];
}
