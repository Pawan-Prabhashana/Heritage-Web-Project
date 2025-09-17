# Group Z - Heritage (Updated Build)

## Quick Start (XAMPP on macOS)
1. Copy this folder to: `/Applications/XAMPP/xamppfiles/htdocs/heritage`
2. Start Apache & MySQL in XAMPP.
3. Visit: `http://localhost/heritage/` (auto-redirects to `/products`).

### Pretty URLs
`.htaccess` is pre-configured for clean routes:
- `/products`, `/experiences`, `/product/{id}`, `/cart`, `/checkout`, `/bookings`, `/faq`, `/about`, `/contact`

### Admin & Artisan
- Admin: `/admin/` (DB included via `app/config/db.php`)
- Artisan: `/artisan/`

### Config
- App bootstrap: `app/config/app.php`
- DB (mysqli): `app/config/db.php`

> Adjust `APP_URL` in `app/config/app.php` if you change the folder name.
