# 📘 Project Best Practices

## 1. Project Purpose
This project is a Real Estate Management System (REMS) built with Laravel. It provides a platform for managing real estate listings, agents, users, and related content such as blogs, testimonials, and galleries. The system supports multiple user roles (admin, agent, user) and is designed for small to medium real estate businesses to manage properties, agents, and customer interactions efficiently.

## 2. Project Structure
- **app/**: Core application logic, including Eloquent models, controllers (organized by domain: Admin, Agent, User, Auth), and service providers.
- **config/**: Configuration files for Laravel and third-party packages.
- **database/**: Migrations, seeds, and factories for database setup.
- **public/**: Publicly accessible assets (CSS, JS, images), entry point (`index.php`).
- **resources/**: Blade templates (views), language files (multi-language support), and raw assets.
- **routes/**: Route definitions (`web.php`, `api.php`, etc.), organized by context.
- **storage/**: Logs, compiled Blade templates, file uploads.
- **tests/**: Feature and unit tests, organized in respective subfolders.
- **vendor/**: Composer dependencies.
- **webpack.mix.js**: Asset compilation configuration.
- **.env / .env.example**: Environment configuration.

### Key Separation of Concerns
- Controllers are grouped by user role and domain.
- Views are organized by frontend/backend and user type.
- Models encapsulate business logic and relationships.
- Configurations and environment variables are externalized.

## 3. Test Strategy
- **Framework**: PHPUnit (configured via `phpunit.xml`).
- **Structure**: Tests are in `tests/Feature` (integration/feature tests) and `tests/Unit` (unit tests).
- **Naming**: Test classes end with `Test.php` and follow PSR-4 autoloading.
- **Mocking**: Use Laravel's built-in mocking and database refresh traits.
- **Philosophy**: Cover controllers, models, and key business logic. Prefer feature tests for HTTP endpoints and user flows; use unit tests for isolated logic.

## 4. Code Style
- **Language**: PHP 7.1+, Laravel 5.6 conventions.
- **Naming**:
  - Classes: StudlyCase (e.g., `PropertyController`)
  - Methods: camelCase
  - Variables: snake_case or camelCase (consistent within context)
  - Blade files: kebab-case
- **Comments**: Use PHPDoc for classes and methods. Inline comments for complex logic.
- **Error Handling**: Use Laravel's exception handling. Validate all user input in controllers. Use try/catch for external integrations.
- **Other**: Use Eloquent relationships for model associations. Use dependency injection in controllers where possible.

## 5. Common Patterns
- **MVC**: Standard Laravel MVC separation.
- **Eloquent Relationships**: Models use `hasMany`, `belongsTo`, `belongsToMany`, and `morphMany` for associations.
- **Service Providers**: Used for bootstrapping shared data and view composers.
- **Blade Templating**: For frontend rendering, with partials for reusable UI components (e.g., navbar, footer).
- **Localization**: Language files in `resources/lang` for multi-language support.
- **Asset Management**: Laravel Mix for compiling CSS/JS.

## 6. Do's and Don'ts
### ✅ Do
- Validate all incoming request data.
- Use Eloquent relationships for data access.
- Organize controllers and views by domain and user role.
- Use environment variables for configuration.
- Write feature and unit tests for new features.
- Use Blade partials for reusable UI.
- Document complex logic with comments or PHPDoc.
- Use migrations and seeds for database changes.

### ❌ Don't
- Don't put business logic in views.
- Don't hardcode configuration values.
- Don't bypass validation in controllers.
- Don't use raw SQL when Eloquent suffices.
- Don't commit sensitive data to version control.

## 7. Tools & Dependencies
- **Laravel 5.6**: Main framework.
- **Materialize, Admin BSB**: Frontend UI frameworks.
- **brian2694/laravel-toastr**: Notifications.
- **intervention/image**: Image processing.
- **phpunit/phpunit**: Testing.
- **squizlabs/php_codesniffer**: Code style checks.
- **npm/laravel-mix**: Asset compilation.
- **Other**: jQuery, Bootstrap, Vue.js for frontend enhancements.

### Setup Instructions
- Clone repo, run `composer install` and `npm install`.
- Copy `.env.example` to `.env` and configure.
- Run `php artisan key:generate`, `php artisan migrate`, `php artisan db:seed`, `php artisan storage:link`.
- Start server with `php artisan serve`.

## 8. Other Notes
- The project supports multi-language (English/Arabic) and RTL/LTR layouts.
- User roles (admin, agent, user) are enforced via middleware and route groups.
- Use view composers for sharing data across views.
- Asset and image uploads are stored in `storage/app/public` and symlinked to `public/storage`.
- When generating new code, follow Laravel conventions for controllers, models, and Blade templates.
- Be mindful of localization and accessibility in UI components.
