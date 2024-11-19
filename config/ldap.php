<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    |
    | Enable or disable logging for LDAP operations.
    |
    */
    'logging' => env('LDAP_LOGGING', true),

    /*
    |--------------------------------------------------------------------------
    | LDAP Connections
    |--------------------------------------------------------------------------
    |
    | Define all LDAP connections here. You can define multiple connections,
    | each with its own settings, such as domain controllers and credentials.
    |
    */
    'connections' => [
        'default' => [
            'hosts' => explode(' ', env('LDAP_HOSTS', '172.20.73.1')), // Multiple hosts separated by space
            'username' => env('LDAP_USERNAME', 'btl\\swiftmanel'),
            'password' => env('LDAP_PASSWORD', 'PymB@200#'),
            'base_dn' => env('LDAP_BASE_DN', 'DC=btl,DC=tn'),
            'port' => env('LDAP_PORT', 389),
            'use_ssl' => env('LDAP_USE_SSL', false),
            'use_tls' => env('LDAP_USE_TLS', false),
            'timeout' => env('LDAP_TIMEOUT', 5),
            'version' => 3, // LDAP version
            'follow_referrals' => false,
        ],
    ],
];
