<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi;

use InspiredMinds\EyepinApi\Model\Response\AccountResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class EyepinApi
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly SerializerInterface $serializer,
    ) {
    }

    public function request(string $xmlPayload): string
    {
        $response = $this->httpClient->request(
            Request::METHOD_POST,
            '', [
                'body' => $xmlPayload,
        ],
        );

        return $response->getContent();
    }

    public function getAccountInfo(): AccountResponse
    {
        $xmlPayload = $this->serializer->serialize(null, 'xml', ['xml_root_node_name' => 'getaccountinfo']);
        $xmlResponse = $this->request($xmlPayload);
        dd($xmlResponse, $this->serializer->deserialize($xmlResponse, AccountResponse::class, XmlEncoder::FORMAT));
    }
}
