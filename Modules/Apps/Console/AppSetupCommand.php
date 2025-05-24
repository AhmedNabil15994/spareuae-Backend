<?php

namespace Modules\Apps\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AppSetupCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'setup app by migrate tables ,seeding seeders , install passport and clear cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('migrate:fresh --force');
        Artisan::call('db:seed --class=\\\Modules\\\Apps\\\Database\\\Seeders\\\SetupAppTableSeeder');
        // Artisan::call('activitylog:clean');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
    }
}
