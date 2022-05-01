<?php

namespace Produpress\Actito\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallActito extends Command
{
    protected $signature = 'actito:install';

    protected $description = 'Install Actito package for Laravel';

    public function handle()
    {
        $this->info('Installing Actito...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('actito.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Actito package for Laravel');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Produpress\Actito\ActitoServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

       $this->call('vendor:publish', $params);
    }
}
