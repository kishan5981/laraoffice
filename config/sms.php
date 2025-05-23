<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Driver
    |--------------------------------------------------------------------------
    |
    | Set this to 'whatsapp' to make WhatsApp the default messaging driver.
    |
    */
    'default' => 'whatsapp',

    /*
    |--------------------------------------------------------------------------
    | List of Drivers
    |--------------------------------------------------------------------------
    |
    | Only keeping 'whatsapp' since we're not using traditional SMS gateways.
    |
    */
    'drivers' => [
        'whatsapp' => [
            'base_url' => 'https://api.whatsapp.com/send',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Maps
    |--------------------------------------------------------------------------
    |
    | Maps the whatsapp driver to your custom driver class.
    |
    */
    'map' => [
        'whatsapp' => App\Drivers\WhatsappDriver::class,
    ],
];
