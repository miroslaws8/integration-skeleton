<?php

namespace Itsimiro\IntegrationSkeleton\Contracts;

interface AuthSettingsRefreshableInterface
{
    public function getRefreshToken(): string;
}