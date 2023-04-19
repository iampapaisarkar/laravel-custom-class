<?php

namespace Iampapaisarkar\LaravelCustomClass\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CustomServiceCommand extends Command
{
    protected $signature = 'make:service {path : The path to the service class}';

    protected $description = 'Create a new service class';

    public function handle()
    {
        $path = $this->argument('path');
        $segments = explode('/', $path);

        $classname = array_pop($segments);
        $namespace = 'App\\Services';
        if (!empty($segments)) {
            $namespace .= '\\' . implode('\\', $segments);
        }

        $folderPath = app_path('Services/' . implode('/', $segments));
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        $filePath = $folderPath . '/' . $classname . '.php';
        if (File::exists($filePath)) {
            $this->error('The service class already exists!');
            return;
        }

        $content = "<?php\n\nnamespace $namespace;\n\nclass $classname\n{\n";
        $content .= "\n    public function __construct()\n    {\n        //\n    }\n";
        $content .= "\n    public function index()\n    {\n        //\n    }\n";
        $content .= "\n    public function store()\n    {\n        //\n    }\n";
        $content .= "\n    public function show()\n    {\n        //\n    }\n";
        $content .= "\n    public function update()\n    {\n        //\n    }\n";
        $content .= "\n    public function destory()\n    {\n        //\n    }\n";
        $content .= "\n}\n";

        File::put($filePath, $content);

        $this->info('The service class has been created successfully!');
    }
}
