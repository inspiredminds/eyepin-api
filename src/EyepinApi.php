<?php

declare(strict_types=1);

/*
 * This file is part of the eyepin API library.
 *
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\EyepinApi;

use InspiredMinds\EyepinApi\Model\Request\AddressInsertRequest;
use InspiredMinds\EyepinApi\Model\Request\AddressListAddRequest;
use InspiredMinds\EyepinApi\Model\Request\GetAddressListsRequest;
use InspiredMinds\EyepinApi\Model\Response\AbstractResponse;
use InspiredMinds\EyepinApi\Model\Response\AccountResponse;
use InspiredMinds\EyepinApi\Model\Response\AddressInsertResponse;
use InspiredMinds\EyepinApi\Model\Response\AddressListAddResponse;
use InspiredMinds\EyepinApi\Model\Response\AddressListsResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
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
        return $this->httpClient->request(Request::METHOD_POST, '', ['body' => $xmlPayload])->getContent();
    }

    public function requestForType(string $xmlPayload, string $type): AbstractResponse
    {
        if (!is_a($type, AbstractResponse::class, true)) {
            throw new \RuntimeException('Type must extend from AbstractResponse');
        }

        $xmlResponse = $this->request($xmlPayload);

        /** @var AbstractResponse $response */
        $response = $this->serializer->deserialize(
            $xmlResponse,
            $type,
            XmlEncoder::FORMAT,
            [
                AbstractNormalizer::REQUIRE_ALL_PROPERTIES => true,
            ],
        );

        if (2000 !== $response->code) {
            throw new \RuntimeException($response->description);
        }

        return $response;
    }

    public function getAccountInfo(): AccountResponse
    {
        $xmlPayload = $this->serializer->serialize(null, 'xml', [XmlEncoder::ROOT_NODE_NAME => 'getaccountinfo']);

        return $this->requestForType($xmlPayload, AccountResponse::class);
    }

    public function getAddressLists(GetAddressListsRequest|null $requestInfo = null): AddressListsResponse
    {
        $xmlPayload = $this->serializer->serialize($requestInfo ?? new GetAddressListsRequest(), 'xml', [XmlEncoder::ROOT_NODE_NAME => 'getaddresslists']);

        return $this->requestForType($xmlPayload, AddressListsResponse::class);
    }

    public function createUpdateAddress(AddressInsertRequest $requestInfo): AddressInsertResponse
    {
        $xmlPayload = $this->serializer->serialize($requestInfo, 'xml', [XmlEncoder::ROOT_NODE_NAME => 'addressinsert']);

        return $this->requestForType($xmlPayload, AddressInsertResponse::class);
    }

    public function addToList(AddressListAddRequest $requestInfo): AddressListAddResponse
    {
        $xmlPayload = $this->serializer->serialize($requestInfo, 'xml', [XmlEncoder::ROOT_NODE_NAME => 'addresslistadd']);

        return $this->requestForType($xmlPayload, AddressListAddResponse::class);
    }
}
