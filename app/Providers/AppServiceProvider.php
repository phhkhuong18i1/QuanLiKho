<?php

namespace App\Providers;
use Cart;
use Illuminate\Support\ServiceProvider;
use App\Kho;
use App\NhomVatTu;
use App\NhaPhanPhoi;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function boot(UrlGenerator $url)
    {
        Schema::defaultStringLength(191);
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }

        $kho = Kho::all();
        view()->share('kho', $kho);

        $nhomvattu = NhomVatTu::all();
        view()->share('nhomvattu',$nhomvattu);

        $nhaphanphoi = NhaPhanPhoi::all();
        view()->share('nhaphanphoi',$nhaphanphoi);
    }

     public function register()
    {
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
}
