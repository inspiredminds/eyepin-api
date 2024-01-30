<?php

namespace InspiredMinds\EyepinApi;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class EyepinApi
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
    ) {
    }
}
