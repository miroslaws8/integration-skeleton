<?php

namespace Itsimiro\IntegrationSkeleton;

use Itsimiro\IntegrationSkeleton\Contracts\AuthClientInterface;
use JsonException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Structure\Interfaces\Structure;

abstract class Api
{
    public function __construct(protected ClientInterface $client, protected AuthClientInterface $authClient)
    {}

    protected function getResult(ResponseInterface $response, string $resultClass): Structure
    {
        if (null === $result = json_decode($response->getBody()->getContents(), true)) {
            throw new JsonException('Incorrect response from the service.');
        }

        return new $resultClass($result);
    }
}