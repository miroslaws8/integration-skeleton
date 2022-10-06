<?php

namespace Itsimiro\IntegrationSkeleton\Contracts;

interface AuthClientInterface
{
    public function getAccessToken(): string;
}