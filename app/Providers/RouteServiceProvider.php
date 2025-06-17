<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para o qual os usuários devem ser redirecionados após o login.
     *
     * @var string
     */
    public const HOME = '/filmes'; // <- Redireciona para /filmes após login ou registro

    /**
     * Define as rotas do aplicativo.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
