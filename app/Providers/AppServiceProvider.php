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
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $kho = Kho::all();
        view()->share('kho', $kho);

        $nhomvattu = NhomVatTu::all();
        view()->share('nhomvattu',$nhomvattu);

        $nhaphanphoi = NhaPhanPhoi::all();
        view()->share('nhaphanphoi',$nhaphanphoi);
    }
}
