# Socialite Provider untuk Google Ads Oauth

## Installing

1. Tambah Repositories ke composer.json

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/aggunawan/google-ads-socialite.git"
  }
]
```

2. Install package

```sh
$ composer require aggunawan/google-ads-socialite
```

3. Tambahkan Google Oauth credentials ke file config/services.php

```php
'googleads' => [
  'client_id' => env('GOOGLEADS_CLIENT_ID'),
  'client_secret' => env('GOOGLEADS_CLIENT_SECRET'),
  'redirect' => env('GOOGLEADS_REDIRECT'),
]
```

4. Ganti Socialite Service Provider

```php
'providers' => [
    // a whole bunch of providers
    // 'Laravel\Socialite\SocialiteServiceProvider',
    \SocialiteProviders\Manager\ServiceProvider::class,
];
```

5. Register di Event Listener

```php
/**
 * The event handler mappings for the application.
 *
 * @var array
 */
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // add your listeners (aka providers) here
        'Aggunawan\\GoogleAdsSocialite\\GoogleAdsExtendSocialite@handle',
    ],
];
```

## Usage

```php
<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class GoogleAdsOauthController extends Controller
{
    /**
     * Redirect User to Oauth consent page.
     *
     */
    public function redirect()
    {
        return Socialite::driver('googleads')->redirect();
    }
    
    /**
     * Handle incoming callback
     *
     */
    public function callback()
    {
        $user = Socialite::driver('googleads')->user();
        dd($user);
    }
}

```
