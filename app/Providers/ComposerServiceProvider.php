<?php

namespace App\Providers;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider //unnötige Klasse wird doch nicht verwendet
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() //Damit man den Wer des Namen der app.blade.php übergeben kann für die navbar
    {
        //
        View::composer('*', function($view) {
            //Request::user();
            $data = User::all() ; //eg User::all();
            //dd($data);
            $view->with('data', $data); // 'data' is value to be used in views 'data' = $data
        });
    }
}
