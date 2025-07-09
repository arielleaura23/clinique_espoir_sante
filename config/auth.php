<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'medecin' => [
            'driver' => 'session',
            'provider' => 'medecins',
        ],
        'patient' => [
            'driver' => 'session',
            'provider' => 'patients',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'medecins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Medecin::class,
        ],
        'patients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Patient::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];
