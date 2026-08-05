<?php

namespace Nameera\NameeraTemplate\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nameera:install {--force : Overwrite existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Nameera Template Starter Kit assets and configuration';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Installing Nameera Template Starter Kit...');

        // Publish configuration
        $this->publishConfig();

        // Publish views and components
        $this->publishViews();

        // Publish JavaScript and CSS assets
        $this->publishAssets();

        // Copy build configuration files
        $this->publishBuildConfig();

        $this->info('Nameera Template installed successfully!');
        $this->info('Please run the following commands:');
        $this->info('1. npm install (or yarn install)');
        $this->info('2. npm run build (or npm run dev for development)');
        $this->info('3. Add "@vite([\'resources/css/admin.css\', \'resources/js/admin.js\'])" to your layout');
    }

    /**
     * Publish views and components to the application.
     */
    private function publishViews(): void
    {
        $viewsSource = dirname(__DIR__, 2) . '/stubs/resources/views';
        
        // Publish auth, dashboard, errors, and layouts views to resources/views
        $viewDirectories = ['auth', 'dashboard', 'errors', 'layouts'];
        
        foreach ($viewDirectories as $directory) {
            $sourceDir = $viewsSource . '/' . $directory;
            $targetDir = resource_path('views/' . $directory);

            if (File::exists($sourceDir)) {
                $this->copyDirectory($sourceDir, $targetDir);
                $this->info("Views published to resources/views/{$directory}");
            }
        }

        // Publish components to resources/views/components/nameera
        $componentsSource = $viewsSource . '/components';
        $componentsTarget = resource_path('views/components/nameera');

        if (File::exists($componentsSource)) {
            $this->copyDirectory($componentsSource, $componentsTarget);
            $this->info('Components published to: ' . $componentsTarget);
        }
    }

    /**
     * Publish configuration file.
     */
    private function publishConfig(): void
    {
        $source = dirname(__DIR__, 2) . '/config/nameera.php';
        $target = config_path('nameera.php');

        if (!File::exists($source)) {
            $this->warn('Config file not found at: ' . $source);
            return;
        }

        if (File::exists($target) && !$this->option('force')) {
            $this->warn('Config file already exists at: ' . $target);
            $this->warn('Use --force to overwrite.');
            return;
        }

        File::copy($source, $target);
        $this->info('Config published to: ' . $target);
    }

    /**
     * Publish JavaScript and CSS assets.
     */
    private function publishAssets(): void
    {
        // CSS files
        $cssSource = dirname(__DIR__, 2) . '/stubs/resources/css';
        $cssTarget = resource_path('css');

        if (File::exists($cssSource)) {
            $this->copyDirectory($cssSource, $cssTarget);
            $this->info('CSS assets published to: ' . $cssTarget);
        }

        // JS files
        $jsSource = dirname(__DIR__, 2) . '/stubs/resources/js';
        $jsTarget = resource_path('js');

        if (File::exists($jsSource)) {
            $this->copyDirectory($jsSource, $jsTarget);
            $this->info('JavaScript assets published to: ' . $jsTarget);
        }
    }

    /**
     * Publish build configuration files (package.json, vite.config.js, etc.)
     */
    private function publishBuildConfig(): void
    {
        $sourceDir = dirname(__DIR__, 2) . '/stubs';
        $targetDir = base_path();

        $files = [
            'package.json',
            'vite.config.js',
            'tailwind.config.js',
            'postcss.config.js',
        ];

        foreach ($files as $file) {
            $source = $sourceDir . '/' . $file;
            $target = $targetDir . '/' . $file;

            if (!File::exists($source)) {
                continue;
            }

            if (File::exists($target) && !$this->option('force')) {
                $this->warn("File exists: {$file}. Use --force to overwrite.");
                continue;
            }

            File::copy($source, $target);
            $this->info("Build config published: {$file}");
        }

        // Also copy .gitignore if it exists
        $gitignoreSource = $sourceDir . '/.gitignore.stub';
        $gitignoreTarget = $targetDir . '/.gitignore';

        if (File::exists($gitignoreSource) && !File::exists($gitignoreTarget)) {
            File::copy($gitignoreSource, $gitignoreTarget);
            $this->info('.gitignore template published');
        }
    }

    /**
     * Copy directory contents recursively.
     */
    private function copyDirectory(string $source, string $destination): void
    {
        if (!File::exists($source)) {
            $this->warn("Source directory does not exist: {$source}");
            return;
        }

        $files = File::allFiles($source);

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $targetPath = $destination . '/' . $relativePath;

            if (File::exists($targetPath) && !$this->option('force')) {
                $this->warn('File exists: ' . $relativePath);
                continue;
            }

            File::ensureDirectoryExists(dirname($targetPath));
            File::copy($file->getPathname(), $targetPath);
        }

        // Copy empty directories
        $directories = File::directories($source);
        foreach ($directories as $directory) {
            $dirName = basename($directory);
            $targetDir = $destination . '/' . $dirName;
            
            if (!File::exists($targetDir)) {
                File::makeDirectory($targetDir, 0755, true);
            }
            
            $this->copyDirectory($directory, $targetDir);
        }
    }
}