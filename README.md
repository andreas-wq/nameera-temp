# Nameera Template - Laravel 13 Starter Kit

A modern, production-ready Laravel starter kit package featuring Tailwind CSS, Alpine.js, and advanced form components with plugin integrations (TinyMCE, Flatpickr, FilePond, Choices.js).

## Features

- 🎨 **Modern UI Components**: Form components with Alpine.js integration
- 🚀 **Plugin Integrations**: TinyMCE 7, Flatpickr, FilePond, Choices.js
- 🎨 **CSS Variables Theme**: Dynamic color system with dark mode support
- 📱 **Responsive Layout**: Mobile-first design with Tailwind CSS
- 🔧 **Production Ready**: Complete build system with Vite
- 📄 **Page Templates**: Login, Dashboard, Error pages included
- 🛠️ **Blade Components**: Reusable, customizable form system

## Requirements

- PHP 8.3+
- Laravel 13+
- Node.js 18+ (for frontend build)
- Composer 2.4+

## Installation

### 1. Local Development Setup (Path Repository)

For testing and development, add the package as a local path repository:

```json
// In your main Laravel project's composer.json
{
  "repositories": [
    {
      "type": "path",
      "url": "../starterkit/packages/nameera/nameera-template",
      "options": {
        "symlink": true
      }
    }
  ]
}
```

Adjust the path according to your directory structure.

### 2. Install Package

```bash
# From your Laravel project root
composer require nameera/nameera-template
```

### 3. Publish Assets and Configuration

```bash
php artisan nameera:install
```

Options:

- `--force` : Overwrite existing files

### 4. Install and Build Frontend Dependencies

```bash
npm install
npm run build
```

For development:

```bash
npm run dev
```

### 5. Add Vite Assets to Layout

In your main layout file (e.g., `resources/views/layouts/app.blade.php`), add:

```blade
@vite(['resources/css/admin.css', 'resources/js/admin.js'])
```

## Usage

### Blade Components

The package provides a comprehensive form system:

#### Basic Form Components

```blade
<x-nameera-input
    name="email"
    label="Email Address"
    type="email"
    required
    :error="$errors->first('email')"
/>

<x-nameera-textarea
    name="description"
    label="Description"
    rows="4"
/>

<x-nameera-label for="email" :required="true">Email</x-nameera-label>
<x-nameera-error for="email" />
```

#### Special Form Components (Plugin Wrappers)

```blade
{{-- Date picker with Flatpickr --}}
<x-nameera-datepicker
    name="birth_date"
    label="Birth Date"
    :options="['dateFormat' => 'Y-m-d']"
/>

{{-- Rich text editor with TinyMCE --}}
<x-nameera-editor
    name="content"
    label="Content"
/>

{{-- Select with search (Choices.js) --}}
<x-nameera-select
    name="category_id"
    label="Category"
>
    <option value="1">Technology</option>
    <option value="2">Business</option>
</x-nameera-select>

{{-- File upload with FilePond --}}
<x-nameera-file-upload
    name="documents[]"
    label="Documents"
    :options="['maxFiles' => 5]"
/>
```

### Page Templates

The package includes ready-to-use page templates:

1. **Login Page**: `resources/views/vendor/nameera/auth/login.blade.php`
2. **Dashboard**: `resources/views/vendor/nameera/dashboard/index.blade.php`
3. **Error Pages**: 403, 404, 500 in `resources/views/vendor/nameera/errors/`

Example usage in routes:

```php
Route::get('/login', function () {
    return view('nameera::auth.login');
});

Route::get('/dashboard', function () {
    return view('nameera::dashboard.index');
})->middleware('auth');
```

### Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag=nameera-config
```

Configuration file: `config/nameera.php`

```php
return [
    'version' => '1.0.0',

    'theme' => [
        'primary' => '#3b82f6',
        'secondary' => '#6b7280',
        'accent' => '#8b5cf6',
        'background' => '#f9fafb',
        'text' => '#111827',
    ],

    'plugins' => [
        'tinymce' => [
            'version' => '7',
            'cdn' => 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js',
        ],
        // ... other plugins
    ],
];
```

### Customizing Colors

The theme uses CSS Variables for dynamic theming. Modify colors in `resources/css/admin.css`:

```css
:root {
  --color-primary-500: 59 130 246; /* Blue 500 */
  --color-secondary-500: 107 114 128; /* Gray 500 */
  --color-accent-500: 168 85 247; /* Purple 500 */
}
```

Tailwind config will automatically map these variables to utility classes.

## Development

### Package Structure

```
packages/nameera/nameera-template/
├── src/
│   ├── Console/
│   │   └── InstallCommand.php
│   └── NameeraTemplateServiceProvider.php
├── stubs/
│   ├── package.json
│   ├── vite.config.js
│   ├── tailwind.config.js
│   ├── postcss.config.js
│   └── resources/
│       ├── css/
│       │   └── admin.css
│       ├── js/
│       │   ├── admin.js
│       │   └── bootstrap.js
│       └── views/
│           ├── layouts/
│           ├── auth/
│           ├── dashboard/
│           ├── errors/
│           └── components/
└── config/
    └── nameera.php
```

### Testing Local Installation

1. **Set up path repository** in your Laravel project
2. **Run installation commands** as documented above
3. **Verify published files**:
   - Views in `resources/views/vendor/nameera/`
   - CSS/JS in `resources/css/` and `resources/js/`
   - Build configs in project root

### Building for Production

```bash
# From the package directory
composer install --no-dev
```

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Support

For issues and feature requests, please open an issue on the GitHub repository.
