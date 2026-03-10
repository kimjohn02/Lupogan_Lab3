# Lupogan - Laboratory Activity 3
## HR Sample Database — Laravel Migration & Model Relationships

This Laravel project implements the HR sample database schema using Laravel's migration system and Eloquent model relationships.

---

## Database Schema

| Table         | Primary Key     | Description                          |
|---------------|-----------------|--------------------------------------|
| `regions`     | `region_id`     | Geographic regions                   |
| `countries`   | `country_id`    | Countries within regions             |
| `locations`   | `location_id`   | Physical office locations            |
| `jobs`        | `job_id`        | Job positions with salary ranges     |
| `departments` | `department_id` | Company departments                  |
| `employees`   | `employee_id`   | Employee records (with self-ref mgr) |
| `dependents`  | `dependent_id`  | Employee dependents/family           |

---

## Relationships

```
regions        ──< countries       (region has many countries)
countries      ──< locations       (country has many locations)
locations      ──< departments     (location has many departments)
jobs           ──< employees       (job has many employees)
departments    ──< employees       (department has many employees)
employees      ──< employees       (employee self-references as manager)
employees      ──< dependents      (employee has many dependents)
```

---

## Models & Eloquent Relationships

### Region
- `hasMany(Country)` — via `region_id`

### Country
- `belongsTo(Region)` — via `region_id`
- `hasMany(Location)` — via `country_id`

### Location
- `belongsTo(Country)` — via `country_id`
- `hasMany(Department)` — via `location_id`

### Job
- `hasMany(Employee)` — via `job_id`

### Department
- `belongsTo(Location)` — via `location_id`
- `hasMany(Employee)` — via `department_id`

### Employee
- `belongsTo(Job)` — via `job_id`
- `belongsTo(Department)` — via `department_id`
- `belongsTo(Employee)` as `manager` — via `manager_id`
- `hasMany(Employee)` as `subordinates` — via `manager_id`
- `hasMany(Dependent)` — via `employee_id`

### Dependent
- `belongsTo(Employee)` — via `employee_id`

---

## Setup Instructions

### Requirements
- PHP 8.2+
- Composer
- MySQL (XAMPP)

### Installation

```bash
# Clone the repository
git clone <repository-url>
cd Lupogan_LabAct3

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lupogan_labact3
DB_USERNAME=root
DB_PASSWORD=

# Generate application key
php artisan key:generate

# Create the database (MySQL)
mysql -u root -e "CREATE DATABASE lupogan_labact3 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run migrations
php artisan migrate
```

---

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
