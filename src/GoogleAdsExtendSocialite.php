<?php

namespace Aggunawan\GoogleAdsSocialite;

use SocialiteProviders\Manager\SocialiteWasCalled;

class GoogleAdsExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('googleads', Provider::class);
    }
}