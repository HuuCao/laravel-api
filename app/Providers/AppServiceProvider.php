<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //
        Blade::directive('datetime', function ($expression) {
            $expression = trim($expression, '\'');
            $expression = trim($expression, '"');

            $dataObject = date_create($expression);

            if(!empty($dataObject)) {
                $dataFormat = $dataObject->format('d/m/Y H:i:s');
                return $dataFormat;
            };
        });

        // Câu lệnh rẻ nhánh
        Blade::if('env', function ($value) {
            // Trả về giá trị boolean
            if(config('app.env') == $value) {
                return true;
            }
            return false;
        });
    }
}
