<?php

namespace InspiredMinds\EyepinApi;

use Symfony\Component\HttpClient\HttpClient;

class EyepinApiFactory
{
    public function __construct(private readonly string $eyepinApiUrl)
    {
    }

    public function createForCredentials(string $username, string $password): EyepinApi
    {
        $client = HttpClient::createForBaseUri($this->eyepinApiUrl, [
            'auth_basic' => [$username, $password],
            'headers' => [
                'Content-Type' => 'text/xml',
            ],
        ]);

        return new EyepinApi($client);
    }
}
