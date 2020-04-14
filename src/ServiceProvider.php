<?php

namespace Anggagewor\Purdia;

use DB;
use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/purdia.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('purdia.php'),
        ], 'purdia-config');
        $this->registerViews();

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/purdia'),
        ], 'purdia-public');
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');


        Blade::component('purdia-card', \Anggagewor\Purdia\View\Components\Base\Card::class);
        Blade::component('purdia-dropdown-menu', \Anggagewor\Purdia\View\Components\Base\DropDownMenu::class);
        Blade::component('purdia-dropdown-item', \Anggagewor\Purdia\View\Components\Base\DropDownItem::class);
        Blade::component('purdia-input', \Anggagewor\Purdia\View\Components\Base\Form\Input::class);
        Blade::component('purdia-input-textarea', \Anggagewor\Purdia\View\Components\Base\Form\InputTextarea::class);
        Blade::component('purdia-input-date-time', \Anggagewor\Purdia\View\Components\Base\Form\InputDateTime::class);
        Blade::component('purdia-input-boolean', \Anggagewor\Purdia\View\Components\Base\Form\InputBoolean::class);
        Blade::component('purdia-table', \Anggagewor\Purdia\View\Components\Base\Table\Table::class);
        Blade::component('purdia-table-head', \Anggagewor\Purdia\View\Components\Base\Table\Thead::class);
        Blade::component('purdia-table-row', \Anggagewor\Purdia\View\Components\Base\Table\Trow::class);
        Blade::component('purdia-table-data', \Anggagewor\Purdia\View\Components\Base\Table\Tdata::class);
        Blade::component('purdia-table-body', \Anggagewor\Purdia\View\Components\Base\Table\Tbody::class);

        Blade::directive('pushonce', function ($expression) {
            $var = '$__env->{"__pushonce_" . md5(__FILE__ . ":" . __LINE__)}';

            return "<?php if(!isset({$var})): {$var} = true; \$__env->startPush({$expression}); ?>";
        });

        Blade::directive('endpushonce', function ($expression) {
            return '<?php $__env->stopPush(); endif; ?>';
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'purdia'
        );

        $this->app->bind('purdia', function () {
            return new Purdia();
        });
        $this->app->register(RouteServiceProvider::class);
    }
    public function registerViews()
    {
        $viewPath = resource_path('views/vendor/purdia');

        $sourcePath = __DIR__.'/../resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', 'purdia']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), 'purdia');
    }
    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/vendor/purdia')) {
                $paths[] = $path . '/vendor/purdia';
            }
        }
        return $paths;
    }
}
