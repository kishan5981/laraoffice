<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => 'Accounting CRM Product Tags',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    'demo' => env('DEMO_MODE', false),

    'db_host' => env('DB_HOST', '127.0.0.1'),
    'db_port' => env('DB_PORT', '3306'),
    'db_prefix' => env('DB_PREFIX', ''),
    'db_database' => env('DB_DATABASE', 'forge'),
    'db_username' => env('DB_USERNAME', 'forge'),
    'db_password' => env('DB_PASSWORD', ''),
    'faker_locale' => 'en_UK',

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost/LaraOffice'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

        /*
     |--------------------------------------------------------------------------
     | Application Date Format
     |--------------------------------------------------------------------------
     |
     | Here you may specify the default date format for your application, which
     | will be used with date and date-time functions.
     |
     */

    'date_format' => 'd-m-Y',
    'date_format_js' => 'dd-mm-yy',
    'date_format_moment' => 'DD-MM-YYYY',
    'time_format_moment' => 'HH:mm:ss',
    'datetime_format_moment' => 'DD-MM-YYYY HH:mm:ss',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'action_buttons_hover' => env('ACTION_BUTTONS_HOVER', false),

    'accounts_module' => env('ACCOUNTS_MODULE', true),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\LaravelBackupPanelServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        'Barryvdh\TranslationManager\ManagerServiceProvider',
        Barryvdh\DomPDF\ServiceProvider::class,
        Stevebauman\Location\LocationServiceProvider::class,
        // Tzsk\Payu\Provider\PayuServiceProvider::class,
        Cartalyst\Stripe\Laravel\StripeServiceProvider::class,
        // Kordy\Ticketit\TicketitServiceProvider::class,
        // Shipu\Themevel\Providers\ThemevelServiceProvider::class,
        Mariuzzo\LaravelJsLocalization\LaravelJsLocalizationServiceProvider::class,
        // Simmatrix\MassMailer\Providers\MassMailerServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

        // 'Input' => Illuminate\Support\Facades\Input::class,
        'Input' => Illuminate\Support\Facades\Request::class,
        'PDF' => Barryvdh\DomPDF\Facade::class,
        'Location' => Stevebauman\Location\Facades\Location::class,
        'Payment' => Tzsk\Payu\Facade\Payment::class,
        'Stripe' => Cartalyst\Stripe\Laravel\Facades\Stripe::class,
        'Theme' => Shipu\Themevel\Facades\Theme::class,
        //'Mailchimp' => DrewM\MailChimp\MailChimp::class,
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
    ],

    'languages' => [
        'en' => 'English',
        /*
        'es' => 'Spanish',
        'pt-br' => 'Brazilian Portuguese',
        'lt' => 'Lithuanian',
        'gr' => 'Greek',
        'id' => 'Bahasa / Indonesia',
        'hi' => 'Hindi',
        'de' => 'German',
        'nl' => 'Dutch',
        'tr' => 'Turkish',
        'bg' => 'Bulgarian',
        'hu' => 'Hungarian',
        'fr' => 'French',
        'ru' => 'Russian',
        'ua' => 'Ukranian',
        'by' => 'Belarusian',
        'ca' => 'Catalan',
        'no' => 'Norwegian-Bokmal',
        'fi' => 'Finnish',
        'zh' => 'Traditional Chinese',
        'zh-Hans' => 'Chinese',
        'it' => 'Italian',
        'ar' => 'Arabic',
        'pl' => 'Polish',
        'se' => 'Swedish',
        'he' => 'Hebrew',
        'ro' => 'Romanian',
        'mn' => 'Mongolian',
        'pt' => 'Portuguese',
        'te' => 'telugu',
        */
    ],
];
