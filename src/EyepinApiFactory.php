<?php

declare(strict_types=1);

namespace InspiredMinds\EyepinApi;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class EyepinApiFactory
{
    private SerializerInterface|null $serializer = null;

    public function __construct(
        private readonly string $eyepinApiUrl = 'https://apiv3.eyepin.com/interface3.php',
    ) {
    }

    public function createForCredentials(string $username, string $password): EyepinApi
    {
        $client = HttpClient::createForBaseUri($this->eyepinApiUrl, [
            'auth_basic' => [$username, $password],
            'headers' => [
                'Content-Type' => 'text/xml',
            ],
        ]);

        return new EyepinApi($client, $this->getSerializer());
    }

    private function getSerializer(): SerializerInterface
    {
        if ($this->serializer) {
            return $this->serializer;
        }

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $objectNormalizer = new ObjectNormalizer($classMetadataFactory, null, null, new ReflectionExtractor());
        $normalizers = [$objectNormalizer, new ArrayDenormalizer()];

        return $this->serializer = new Serializer($normalizers, [new XmlEncoder()]);
    }
}
