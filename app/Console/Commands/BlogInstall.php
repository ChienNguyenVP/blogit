<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class BlogInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install blog Nguyen Manh';

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
        if ($this->confirm('Do you want to install it?', false)) {
            Artisan::call('key:generate');
            Artisan::call('migrate');
            Artisan::call('db:seed');
            $this->displayOutput();
        }
    }
}
