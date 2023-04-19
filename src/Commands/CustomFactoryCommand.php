<?php

namespace Iampapaisarkar\LaravelCustomClass\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CustomFactoryCommand extends Command
{
    protected $signature = 'make:custom-factory {path : The path to the factory class}';

    protected $description = 'Create a new factory class';

    public function handle()
    {
        $path = $this->argument('path');
        $segments = explode('/', $path);

        $classname = array_pop($segments);
        $namespace = 'App\\Factories';
        if (!empty($segments)) {
            $namespace .= '\\' . implode('\\', $segments);
        }

        $folderPath = app_path('Factories/' . implode('/', $segments));
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        $filePath = $folderPath . '/' . $classname . '.php';
        if (File::exists($filePath)) {
            $this->error('The factory class already exists!');
            return;
        }

        $content = "<?php\n\nnamespace $namespace;\n\nclass $classname\n{\n";
        $content .= "\n}\n";

        File::put($filePath, $content);

        $this->info('The factory class has been created successfully!');
    }
}
