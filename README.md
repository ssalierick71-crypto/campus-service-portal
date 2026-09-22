# Campus Service Portal (Laravel)

A campus helpdesk built with **Laravel 12**. Students and staff report faults (Estates, ICT, Halls,
Hostels, Registry), follow their tickets, and reach the helpdesk through a contact page that stores
every message in the database.

This repository is the Laravel version of the Campus Service Portal front-end template. It follows
the project development covered in Laravel Episodes 16–19:

| Episode | Topic | In this project |
| --- | --- | --- |
| 16 | Adding the front-end template to Laravel — home page | `resources/views/home.blade.php` on `layouts.public` |
| 17 | Adding the front-end to Laravel — contact page | `resources/views/contact.blade.php` |
| 18 | Adding data to the database | `contacts` migration, `Contact` model, `ContactController@store` |
| 19 | Fixing the contact page and routes | named routes in `routes/web.php`, `POST /contact`, CSRF, validation |

## Requirements

- PHP 8.2 or newer (XAMPP works)
- Composer
- MySQL / MariaDB

## Setup

```bash
git clone https://github.com/ssalierick71-crypto/campus-service-portal.git
cd campus-service-portal
composer install
cp .env.example .env
php artisan key:generate
```

Create the database (phpMyAdmin, or the command line):

```sql
CREATE DATABASE campus_service_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

The `.env` file already points at that database with the default XAMPP user (`root`, no password).
Then run the migrations, add the sample messages, and start the server:

```bash
php artisan migrate --seed
php artisan serve
```

Open http://127.0.0.1:8000.

## The contact form

`GET /contact` shows the form. `POST /contact` runs through `ContactController@store`, which:

1. validates name, campus email, department, and message;
2. saves the message to the `contacts` table with `Contact::create()`;
3. redirects back to the contact page with a success message.

Failed validation returns to the form with the errors and the old input. Every stored message is
listed for the administrator at `/admin/messages`.

## Pages

| Area | Route | View |
| --- | --- | --- |
| Public | `/`, `/contact` | `home`, `contact` |
| Auth screens | `/login`, `/register`, `/forgot-password`, `/reset-password` | `auth/*` |
| Requester | `/dashboard`, `/requests`, `/requests/create`, `/requests/{ticket}`, `/requests/{ticket}/edit`, `/notifications`, `/profile` | `dashboard`, `requests/*` |
| Handler | `/staff/dashboard` | `staff/dashboard` |
| Administrator | `/admin/dashboard`, `/admin/messages`, `/admin/departments`, `/admin/categories`, `/admin/users` | `admin/*` |

Run `php artisan route:list --except-vendor` to see them all.

## Blade structure

The repeated parts of the template are partials, not copies:

```
resources/views/
├── layouts/      public.blade.php · auth.blade.php · app.blade.php
├── partials/     head · public-header · app-header · app-sidebar · footers
├── auth/         login · register · forgot-password · reset-password
├── requests/     index · create · show · edit
├── staff/        dashboard
└── admin/        dashboard · messages · departments · categories · users
```

`layouts/app.blade.php` takes a role (`student`, `staff`, `admin`) and builds the sidebar and the
user card from `config/portal.php`, so one layout serves all three dashboards. The sidebar marks the
current page using `request()->routeIs()`.

CSS, the logo, and other template assets live in `public/assets` and are linked with `asset()`.

## Tests

```bash
php artisan test
```

`tests/Feature/ContactTest.php` covers the contact page loading, a message being stored, and invalid
input being rejected.

## Notes

- `vendor/` and `.env` are not committed — that is the normal Laravel setup. Run `composer install`
  and copy `.env.example` to `.env` after cloning.
- The dashboards still show prototype content; the contact page is the part wired to the database.
