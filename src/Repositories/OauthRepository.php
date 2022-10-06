<?php

namespace Itsimiro\IntegrationSkeleton;

use DateTimeImmutable;
use Itsimiro\IntegrationSkeleton\Contracts\AuthSettingsInterface;
use Structure\Interfaces\Structure;

abstract class OauthRepository
{
    public function __construct(protected AuthSettingsInterface $settings)
    {}

    abstract public function updateAccessToken(Structure $updateData): void;

    public function accessTokenExpired(): bool
    {
        return $this->settings->getExpiredDate()
            && (new DateTimeImmutable())->getTimestamp() > $this->settings->getExpiredDate()->getTimestamp();
    }

    public function shouldUpdateOauthToken(): bool
    {
        return !$this->settings->getAccessToken() || $this->accessTokenExpired();
    }

    public function canCreateAccessToken(): bool
    {
        return $this->settings->getClientId() && $this->settings->getClientSecret();
    }
}