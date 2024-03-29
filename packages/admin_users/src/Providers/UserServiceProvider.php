<?php

namespace Package\AdminUser\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register config file here (Chỉ áp dụng cho configs không sắp sếp theo thứ tự)
     * alias => path
     */
    private $configFile = [
        'app'       => 'app.php',
        'auth'      => 'auth.php',
    ];

    /**
     * Register commands file here
     * alias => path
     */
    protected $commands = [
        'Package\AdminUser\Commands\AdminUserSeedCommand',
    ];

    /**
     * Register middleare file here
     * name => middleware
     */
    protected $middleware = [
        'auth-admin' => '\Package\AdminUser\Http\Middleware\AdminAuthenticate',
        'only-dev' => '\Package\AdminUser\Http\Middleware\OnlyDev',
    ];

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        // Đăng ký config cho từng Module
        $this->mergeConfig();
        // boot commands
        $this->commands($this->commands);
    }

    public function boot() 
    {
        Schema::defaultStringLength(191);
        
        $this->registerModule();

        $this->publishCore();

        $this->registerMiddleware();
    }

    /*
    * Đăng ký tự động các modules
    */
    private function registerModule() 
    {
        $modulePath = __DIR__.'/../../';
        $moduleName = 'AdminUser';
        // boot route
        if (File::exists($modulePath."routes/routes.php")) {
            $this->loadRoutesFrom($modulePath."/routes/routes.php");
        }

        // boot migration
        if (File::exists($modulePath . "migrations")) {
            $this->loadMigrationsFrom($modulePath . "migrations");
        }

        // boot languages
        if (File::exists($modulePath . "resources/lang")) {
            $this->loadTranslationsFrom($modulePath . "resources/lang", $moduleName);
            $this->loadJSONTranslationsFrom($modulePath . 'resources/lang');
        }

        // boot views
        if (File::exists($modulePath . "resources/views")) {
            $this->loadViewsFrom($modulePath . "resources/views", $moduleName);
        }

        // boot all helpers
        if (File::exists($modulePath . "helpers")) {
            // get all file in Helpers Folder 
            $helper_dir = File::allFiles($modulePath . "helpers");
            // foreach to require file
            foreach ($helper_dir as $key => $value) {
                $file = $value->getPathName();
                require $file;
            }
        }
    }

    /*
    * publish dự án ra ngoài
    * publish config File
    * publish assets File
    */
    public function publishCore()
    {
        // if ($this->app->runningInConsole()) {
        //     $assets = [
        //         __DIR__.'/../../resources/assets' => public_path(),
        //     ];
        //     $config = [
        //         __DIR__.'/../../config/PackageWidget.php' => config_path('PackageWidget.php'),
        //         __DIR__.'/../../config/PackageMenu.php' => config_path('PackageMenu.php'),
        //         __DIR__.'/../../config/PackageModule.php' => config_path('PackageModule.php'),
        //     ];
        //     $all = array_merge($assets, $config);
        //     // Khởi chạy chung theo core
        //     $this->publishes($all, 'Package/core');
        //     $this->publishes($assets, 'Package/core/assets');
        //     $this->publishes($config, 'Package/core/config');
        // }
    }

    /*
    * Đăng ký config cho từng Module
    * $this->configFile
    */
    public function mergeConfig() {
        foreach ($this->configFile as $alias => $path) {
            $config = $this->app['config']->get($alias, []);
            $this->app['config']->set($alias, $this->mergeArrayConfigs(require __DIR__ . "/../../config/" . $path, $config));
        }
    }

    /**
     * Merge config để lấy ra mảng chung
     * Ưu tiên lấy config ở app
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeArrayConfigs(array $original, array $merging) 
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (! is_array($value)) { continue; }
            if (! \Arr::exists($merging, $key)) { continue; }
            if (is_numeric($key)) { continue; }
            $array[$key] = $this->mergeArrayConfigs($value, $merging[$key]);
        }
        return $array;
    }

    /**
     * Đăng ký Middleware
     */
    public function registerMiddleware()
    {
        foreach ($this->middleware as $key => $value) {
            $this->app['router']->pushMiddlewareToGroup($key, $value);
        }
    }
}
