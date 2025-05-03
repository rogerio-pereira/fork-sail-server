<?php

use App\Http\Controllers\HomeController;
use App\Models\Stat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

Route::get('/', [ HomeController::class, 'index' ]);

Route::get('/{name}', function (Request $request, $name) {
    $availableServices = [
        'mysql',
        'pgsql',
        'mariadb',
        'mongodb',
        'redis',
        'rabbitmq',
        'valkey',
        'memcached',
        'meilisearch',
        'typesense',
        'minio',
        'mailpit',
        'selenium',
        'soketi',
    ];

    $availableFrontends = [
        'react',
        'vue',
        'livewire',
        'livewire-class-components',
    ];

    $availableAuthentication = [
        'workos',
    ];

    $availableTestFrameworks = [
        'phpunit',
        'pest',
    ];

    $php = $request->query('php', '84');

    $with = array_unique(explode(',', $request->query('with', 'mysql,redis,meilisearch,mailpit,selenium')));

    $frontend = $request->query('frontend', 'livewire');
    $auth = $request->query('auth', null);
    $tests = $request->query('tests', 'pest');

    try {
        Validator::validate(
            [
                'name' => $name,
                'php' => $php,
                'with' => $with,
                'frontend' => $frontend,
                'auth' => $auth,
                'tests' => $tests,
            ],
            [
                'name' => 'string|alpha_dash',
                'php' => ['string', Rule::in(['74', '80', '81', '82', '83', '84'])],
                'with' => 'array',
                'with.*' => [
                    'required',
                    'string',
                    count($with) === 1 && in_array('none', $with) ? Rule::in(['none']) : Rule::in($availableServices)
                ],

                'frontend' => ['string', Rule::in($availableFrontends)],
                'auth' => ['nullable', 'string', Rule::in($availableAuthentication)],
                'tests' => ['string', Rule::in($availableTestFrameworks)],
            ]
        );
    } catch (ValidationException $e) {
        $errors = Arr::undot($e->errors());

        if (array_key_exists('name', $errors)) {
            return response('Invalid site name. Please only use alpha-numeric characters, dashes, and underscores.', 400);
        }

        if (array_key_exists('php', $errors)) {
            return response('Invalid PHP version. Please specify a supported version (74, 80, 81, 82, 83, or 84).', 400);
        }

        if (array_key_exists('with', $errors)) {
            return response('Invalid service name. Please provide one or more of the supported services ('.implode(', ', $availableServices).') or "none".', 400);
        }

        if (array_key_exists('frontend', $errors)) {
            return response('Invalid frontend. Please provide one supported frontend ('.implode(', ', $availableFrontends).') or leave it empty (it will use livewire).', 400);
        }

        if (array_key_exists('auth', $errors)) {
            return response('Invalid Authentication Provider. Please provide one supported Authentication Provider ('.implode(', ', $availableAuthentication).') or leave it empty (it will use laravel).', 400);
        }

        if (array_key_exists('tests', $errors)) {
            return response('Invalid testing framework. Please provide one supported testing framework ('.implode(', ', $availableTestFrameworks).') or leave it empty (it will use pest).', 400);
        }
    }

    $services = implode(' ', $with);

    $with = implode(',', $with);

    $devcontainer = $request->has('devcontainer') ? '--devcontainer' : '';

    //Prepend -- to frontend, auth and test
    $frontend = ($frontend) ? "--{$frontend}" : null;
    $testFramework = ($tests) ? "--{$tests}" : null;

    /*
     * Adding a trailing space because if not on all tests i have to fix to 
     *      laravel new example-app --livewire  --no-interaction
     * It will have two spaces after --livewire
     */
    $auth = ($auth) ? "--{$auth} " : null;

    $script = str_replace(
        ['{{ php }}', '{{ name }}', '{{ frontend }}', '{{ authProvider }} ', '{{ testFramework }}', '{{ with }}', '{{ devcontainer }}', '{{ services }}'],
        [$php, $name, "$frontend", "$auth", "$testFramework", $with, $devcontainer, $services],
        file_get_contents(resource_path('scripts/php.sh'))
    );

    $now = Carbon::now();
    Stat::create(['installed_at' => $now]);

    return response($script, 200, ['Content-Type' => 'text/plain']);
});
