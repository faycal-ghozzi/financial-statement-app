<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        // 'guard' => env('AUTH_GUARD', 'web'),
        // 'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
        'guard' => 'web',
        'passwords' => 'users'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | which utilizes session storage plus the LDAP user provider.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // Matches the provider defined below
            // 'provider' => 'ldap',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication guards have a user provider, which defines how the
    | users are actually retrieved from your LDAP directory or other storage
    | system used by the application.
    |
    | Supported drivers: "ldap", "database", "eloquent"
    |
    */

    'providers' => [
        'ldap' => [
            'driver' => 'ldap',
            'model' => App\Models\User::class, // Your application's User model
        ],

        // Uncomment and use this if you need a database fallback provider:
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\User::class,
        // ],
    ],

    // /*
    // |--------------------------------------------------------------------------
    // | Resetting Passwords
    // |--------------------------------------------------------------------------
    // |
    // | These options configure the behavior of password resets. Password resets
    // | are typically not supported with LDAP, as passwords are managed in the
    // | directory. This configuration exists for fallback authentication cases.
    // |
    // */

    // 'passwords' => [
    //     'users' => [
    //         'provider' => 'users',
    //         'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
    //         'expire' => 60, // Tokens are valid for 60 minutes
    //         'throttle' => 60, // Limit requests to one per minute
    //     ],
    // ],

    // /*
    // |--------------------------------------------------------------------------
    // | Password Confirmation Timeout
    // |--------------------------------------------------------------------------
    // |
    // | The amount of seconds before a password confirmation window expires and
    // | users are asked to re-enter their password. Defaults to 3 hours.
    // |
    // */

    // 'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
