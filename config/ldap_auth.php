<?php

return [
    /*
    |--------------------------------------------------------------------------
    | LDAP Authentication Provider
    |--------------------------------------------------------------------------
    |
    | The provider configuration that LdapRecord will use for authenticating
    | LDAP users. This should match your `auth.php` configuration.
    |
    */
    'provider' => [
        'name' => 'ldap',
        'driver' => 'ldap',
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    |
    | Validation rules applied during authentication to ensure users
    | meet specific criteria, such as not being soft-deleted in LDAP.
    |
    */
    'rules' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    | Scopes applied when querying the LDAP directory for users during
    | authentication or import. These can limit the users to specific groups.
    |
    */
    'scopes' => [
        // Example: LdapRecord\Laravel\Scopes\UpnScope::class
    ],

    /*
    |--------------------------------------------------------------------------
    | User Identifiers
    |--------------------------------------------------------------------------
    |
    | Attributes used to locate and authenticate users in the LDAP directory.
    | The "bind_users_by" option determines the attribute used for binding.
    |
    */
    'identifiers' => [
        'ldap' => [
            'locate_users_by' => 'samaccountname',
            'bind_users_by' => 'distinguishedname',
        ],
        'database' => [
            'guid_column' => 'objectguid',
            'username_column' => 'username',
        ],
        'windows' => [
            'locate_users_by' => 'samaccountname',
            'server_key' => 'AUTH_USER',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Sync
    |--------------------------------------------------------------------------
    |
    | Whether to synchronize LDAP passwords to the local database. If false,
    | random hashed passwords will be generated for users upon import.
    |
    */
    'passwords' => [
        'sync' => env('LDAP_PASSWORD_SYNC', true),
        'column' => 'password',
    ],

    /*
    |--------------------------------------------------------------------------
    | Login Fallback
    |--------------------------------------------------------------------------
    |
    | Whether to fallback to the local database for authentication if
    | LDAP authentication fails.
    |
    */
    'login_fallback' => env('LDAP_LOGIN_FALLBACK', false),

    /*
    |--------------------------------------------------------------------------
    | Sync Attributes
    |--------------------------------------------------------------------------
    |
    | Map LDAP attributes to local database columns during synchronization.
    |
    */
    'sync_attributes' => [
        'username' => 'samaccountname',
        'name' => 'cn',
        'role' => 'memberof'
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    |
    | Enable logging for authentication events.
    |
    */
    'logging' => [
        'enabled' => env('LDAP_LOGGING', true),
    ],
];
