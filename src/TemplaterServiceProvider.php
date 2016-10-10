<?php
/**
 * Created by mamadou.
 * User: mamadou
 * Date: 9/26/2016
 * Time: 1:12 PM
 */
namespace Sulsira\Templater;

use Illuminate\Support\ServiceProvider;

class TemplaterServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('templater', function($app){
           return new Templater;
       });
    }

    public function boot()
    {
        require __DIR__. '/Http/routes.php';
    }
}