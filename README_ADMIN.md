# Heritage • Admin Backend (PHP, XAMPP macOS)

## Quick setup (macOS + XAMPP)
1) Copy the entire folder to: `/Applications/XAMPP/xamppfiles/htdocs/heritage`
2) Start Apache & MySQL in XAMPP. Ensure MySQL port is **3306**. (phpMyAdmin may run at http://localhost:8080/phpmyadmin)
3) Create DB `heritage` (if not already), then import your `schema.sql`. After that, run the new migration:
   - Open http://localhost:8080/phpmyadmin and run `migrations/2025_09_17_000001_admin_backend.sql`
4) Seed default admin:
   - Visit `http://localhost:8080/heritage/seeds/seed_admin.php` once.
   - Login with **admin@heritage.local / admin123** (change later in Users).
5) Admin URL:
   - `http://localhost:8080/heritage/admin/login.php`

## Notes
- Config: `config.php`
- DB conn: `includes/db.php` (PDO)
- Security: CSRF, sessions, role-checks
- CRUD pages: in `/admin/*.php` with server-side pagination & search
- APIs: `/api/toggle_status.php` (AJAX-friendly)
- Analytics: `/admin/analytics.php` prints JSON blocks ready for charts
- This backend is additive: it does **not** remove your existing FE files.


## Artisan Backend Added (2025-09-17)
See /pages/* for artisan pages. Run migration 000002 for variants/images/alerts.
