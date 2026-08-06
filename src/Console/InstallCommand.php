<?php

namespace Nameera\NameeraTemplate\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process as SymfonyProcess;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nameera:install {--force : Overwrite existing files} {--no-build : Skip npm install and build}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Nameera Template Ultimate Starter Kit with UI Showcase and Auto-Routes';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('🚀 Installing Nameera Ultimate Starter Kit...');

        // 1. Publish configuration
        $this->publishConfig();

        // 2. Publish views and components (with new pages directory)
        $this->publishViews();

        // 3. Publish JavaScript and CSS assets
        $this->publishAssets();

        // 4. Copy build configuration files
        $this->publishBuildConfig();

        // 5. Inject routes automatically
        $this->injectRoutes();

        // 6. Run npm commands (unless --no-build flag is used)
        if (!$this->option('no-build')) {
            $this->runNpmCommands();
        }

        $this->newLine();
        $this->info('🎉 Nameera Ultimate Starter Kit installed successfully!');
        $this->newLine();
        $this->info('📋 Quick Start Guide:');
        $this->info('   1. Visit http://your-app.test/ui/dashboard to see the UI showcase');
        $this->info('   2. Check http://your-app.test/login for the auth page');
        $this->info('   3. Explore form components at http://your-app.test/ui/form-basic');
        $this->info('   4. View all available routes with: php artisan route:list');
        $this->newLine();
        $this->info('🔧 All assets are ready to use! No additional configuration needed.');
    }

    /**
     * Publish views and components to the application.
     */
    private function publishViews(): void
    {
        $viewsSource = dirname(__DIR__, 2) . '/stubs/resources/views';
        
        // Publish auth, pages, errors, and layouts views to resources/views
        $viewDirectories = ['auth', 'pages', 'errors', 'layouts'];
        
        foreach ($viewDirectories as $directory) {
            $sourceDir = $viewsSource . '/' . $directory;
            $targetDir = resource_path('views/' . $directory);

            if (File::exists($sourceDir)) {
                $this->copyDirectory($sourceDir, $targetDir);
                $this->info("✅ Views published to resources/views/{$directory}");
            }
        }

        // Publish component views to resources/views/components (not vendor)
        $componentsSource = $viewsSource . '/components';
        $componentsTarget = resource_path('views/components');

        if (File::exists($componentsSource)) {
            $this->copyDirectory($componentsSource, $componentsTarget);
            $this->info('✅ Component views published to: ' . $componentsTarget);
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

    /**
     * Inject UI showcase routes to web.php
     */
    private function injectRoutes(): void
    {
        $routesStub = dirname(__DIR__, 2) . '/stubs/routes/nameera-ui.php';
        $webRoutesPath = base_path('routes/web.php');

        if (!File::exists($routesStub)) {
            $this->warn('Routes stub not found: ' . $routesStub);
            return;
        }

        if (!File::exists($webRoutesPath)) {
            $this->warn('web.php routes file not found: ' . $webRoutesPath);
            return;
        }

        // Read existing web.php content
        $webContent = File::get($webRoutesPath);
        $routesContent = File::get($routesStub);

        // Check if routes are already injected
        if (strpos($webContent, '// Nameera UI Showcase Routes') !== false) {
            $this->info('✅ Routes already injected into web.php');
            return;
        }

        // Append routes to web.php
        $injectedContent = $webContent . PHP_EOL . PHP_EOL . '// Nameera UI Showcase Routes' . PHP_EOL . $routesContent;

        File::put($webRoutesPath, $injectedContent);
        $this->info('✅ Routes injected to web.php');
    }

    /**
     * Run npm install and npm run build
     */
    private function runNpmCommands(): void
    {
        $this->info('📦 Installing npm dependencies...');

        $npmInstallProcess = new SymfonyProcess(['npm', 'install']);
        $npmInstallProcess->setTimeout(300); // 5 minutes timeout
        $npmInstallProcess->setWorkingDirectory(base_path());
        
        try {
            $npmInstallProcess->run(function ($type, $buffer) {
                if (SymfonyProcess::ERR === $type) {
                    $this->warn('npm install warning: ' . $buffer);
                } else {
                    $this->line($buffer);
                }
            });

            if ($npmInstallProcess->isSuccessful()) {
                $this->info('✅ npm dependencies installed');
            } else {
                $this->warn('⚠️ npm install failed. You may need to run it manually.');
                $this->warn('Error: ' . $npmInstallProcess->getErrorOutput());
            }
        } catch (\Exception $e) {
            $this->warn('⚠️ npm install failed with exception: ' . $e->getMessage());
            $this->warn('You may need to run npm install manually.');
        }

        $this->info('🔨 Building assets...');

        $npmBuildProcess = new SymfonyProcess(['npm', 'run', 'build']);
        $npmBuildProcess->setTimeout(300); // 5 minutes timeout
        $npmBuildProcess->setWorkingDirectory(base_path());
        
        try {
            $npmBuildProcess->run(function ($type, $buffer) {
                if (SymfonyProcess::ERR === $type) {
                    $this->warn('npm build warning: ' . $buffer);
                } else {
                    $this->line($buffer);
                }
            });

            if ($npmBuildProcess->isSuccessful()) {
                $this->info('✅ Assets built successfully');
            } else {
                $this->warn('⚠️ npm run build failed. You may need to run it manually.');
                $this->warn('Error: ' . $npmBuildProcess->getErrorOutput());
            }
        } catch (\Exception $e) {
            $this->warn('⚠️ npm run build failed with exception: ' . $e->getMessage());
            $this->warn('You may need to run npm run build manually.');
        }
    }
}
