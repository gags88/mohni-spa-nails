# Mohni Spa & Nails

Website for [Mohni Spa & Nails](https://mohnispanails.com), a spa and beauty salon in Winnipeg, Manitoba. The site presents the salon, services, contact information, promotions, and online booking, with a small admin area for managing homepage banners.

## Features

- Responsive public website
- Individual pages for spa, nail, skin, hair-removal, and beauty services
- Homepage banner management
- Admin authentication
- Square appointment-booking integration
- Interior-inspired ivory, charcoal, taupe, and eucalyptus color palette
- SQLite support for local development

## Technology

- PHP 7.3 or newer
- Laravel 8
- Blade templates
- SQLite for local development
- Laravel Mix, Sass, and JavaScript

## Local setup

Clone the repository and install the PHP and JavaScript dependencies:

```bash
git clone https://github.com/gags88/mohni-spa-nails.git
cd mohni-spa-nails
composer install
npm install
```

Create the local environment file and application key:

```bash
cp .env.example .env
php artisan key:generate
```

Create the SQLite database:

```bash
touch database/database.sqlite
```

Configure these values in `.env`, using the absolute path to your local database file:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/mohni-spa-nails/database/database.sqlite
DB_FOREIGN_KEYS=true
```

Run the migrations and build the frontend assets:

```bash
php artisan migrate
npm run development
```

Start the local development server:

```bash
php artisan serve
```

The website will be available at `http://127.0.0.1:8000`.

## Useful commands

```bash
# Run automated tests
php artisan test

# Check migration status
php artisan migrate:status

# Clear application caches
php artisan optimize:clear

# Build production assets
npm run production
```

## Project structure

- `app/Http/Controllers` — public and admin request handling
- `database/migrations` — database schema
- `public/css/interior-palette.css` — interior-inspired website palette
- `public/images` — production website imagery
- `resources/views` — Blade page templates and shared layouts
- `routes/web.php` — public, service, and admin routes

## Local files

The `.env` file, SQLite database, dependencies, runtime caches, and backup archives are intentionally excluded from Git. Never commit production credentials or customer data.

## Deployment

Pushes to `main` deploy the redesigned site to the password-protected `/modern` preview on Hostinger through [the GitHub Actions workflow](.github/workflows/deploy.yml). The existing website root is left untouched. The workflow runs the test suite first, synchronizes a separate application copy, installs optimized Composer dependencies, runs migrations, refreshes Laravel caches, links the preview beneath `public_html/modern`, and verifies that unauthenticated visitors reach the preview login screen.

Preview authentication is enforced by Laravel for every web route when `MODERN_PREVIEW_ENABLED=true`. A successful password entry is valid for 120 minutes, uses an isolated `/modern` session cookie, disables browser caching, and sends `noindex` headers. The deployed password is represented in source only by a one-way bcrypt hash.

The GitHub repository requires a `HOSTINGER_SSH_KEY` Actions secret containing an unencrypted private key authorized for the Hostinger account. Production configuration remains in the server-side `.env` and is never copied from GitHub.

Frontend assets are committed in `public/css` and `public/js`; this legacy Laravel Mix project does not rebuild them during deployment.
