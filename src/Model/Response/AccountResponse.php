<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi\Model\Response;

use InspiredMinds\EyepinApi\Model\Account;

class AccountResponse extends AbstractResponse
{
    /** @var list<Account> */
    public array $data = [];
}
