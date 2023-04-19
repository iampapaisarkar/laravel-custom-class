<?php

namespace Iampapaisarkar\LaravelCustomClass\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CustomTraitCommand extends Command
{
    protected $signature = 'make:trait {path : The path to the trait class}';

    protected $description = 'Create a new trait class';

    public function handle()
    {
        $path = $this->argument('path');
        $segments = explode('/', $path);

        $classname = array_pop($segments);
        $namespace = 'App\\Traits';
        if (!empty($segments)) {
            $namespace .= '\\' . implode('\\', $segments);
        }

        $folderPath = app_path('Traits/' . implode('/', $segments));
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        $filePath = $folderPath . '/' . $classname . '.php';
        if (File::exists($filePath)) {
            $this->error('The trait class already exists!');
            return;
        }

        $content = "<?php\n\nnamespace $namespace;\n\nclass $classname\n{\n";
        $content .= "\n}\n";

        File::put($filePath, $content);

        $this->info('The trait class has been created successfully!');
    }
}
