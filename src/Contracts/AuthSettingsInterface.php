<?php

namespace Itsimiro\IntegrationSkeleton\Contracts;

use DateTimeInterface;

interface AuthSettingsInterface
{
    public function getClientId(): string;
    public function getClientSecret(): string;
    public function getAccessToken(): string;
    public function getExpiredDate(): ?DateTimeInterface;
}