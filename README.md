# Group Z - Heritage — Full Build (Frontend + Backend)

This package adds a complete PHP backend on top of your uploaded frontend. It uses your **`schema.sql`** (tables like `users`, `products`, `experiences`, `orders`, `bookings`, etc.) and exposes clean JSON APIs that the existing pages auto‑bind to. schema

## Quick start (XAMPP on macOS)
1. Unzip **Heritage-FULL-BUILD.zip** into XAMPP htdocs, e.g.  
   `/Applications/XAMPP/xamppfiles/htdocs/heritage`
2. Ensure the DB is imported (`heritage` database from your `schema.sql`).  
   Default DB creds in `/config/config.php`: `root` / *(empty)*.
3. Fix permissions for uploads (images will go here):
   ```bash
   sudo chmod -R 775 /Applications/XAMPP/xamppfiles/htdocs/heritage/storage/uploads
   ```
4. Seed the very first Admin (one‑time): open  
   `http://localhost:8080/heritage/api/admin/setup.php`  
   → It will create admin `admin@local` / `admin123` (only if no admin exists).
5. Visit `http://localhost:8080/heritage/auth.php` to log in / register.
6. Admin: `/admin/index.php` • Users: `/admin/users.php` • Analytics: `/admin/analytics.php`.

## What’s included
- **Auth** (register/login/logout, sessions) with roles: *Admin, Artisan, Customer*.
- **Categories, Products, Variants & Images** (CRUD for artisans/admin).
- **Experiences & Images**, **Bookings** (customers).
- **Cart & Checkout** (session cart + **simulated payment** → creates `orders`, `order_items`, `payments`).
- **Admin**: users list + status toggle (suspend/activate), high‑level analytics counters.
- **Notifications/Reviews/Flags/Disputes** tables are present per schema; endpoints can be extended similarly.
- **Uploads** go to `/storage/uploads/{products|experiences}` and are web‑served from `/storage/uploads/...`.

## API map (selected)
- `POST /api/auth/register.php` `{name,email,password,role?=Customer|Artisan}`
- `POST /api/auth/login.php` `{email,password}` → sets session
- `POST /api/auth/logout.php`
- `GET  /api/categories/list.php`
- `GET  /api/products/list.php?[q=&category_id=&artisan_id=]`
- `GET  /api/products/get.php?id=`
- `POST /api/products/create.php` *(multipart)* `title, base_price, stock_qty?, description?, image?, category_ids[]`
- `POST /api/products/update.php` JSON `{id, ...fields}`
- `GET  /api/experiences/list.php?[artisan_id=]`
- `POST /api/experiences/create.php` *(multipart)* `title, base_price, max_participants, start_datetime, end_datetime, image?`
- `POST /api/bookings/create.php` `{experience_id, qty}` *(Customer)*
- `GET  /api/orders/cart.php`, `POST /api/orders/add_to_cart.php` `{product_id, qty}`, `POST /api/orders/checkout.php`
- **Admin**: `GET /api/admin/users_list.php`, `POST /api/admin/user_set_status.php`, `GET /api/admin/summary.php`
- **Bootstrap Admin**: `GET /api/admin/setup.php` *(only creates admin if none exists)*

## Frontend wiring added
- Injected scripts in `partials/header.php` and `partials/admin-header.php`:
  - `/assets/js/heritage-api.js` — API client + auto‑binding for **Auth**, **Admin/Users**, **Artisan product form**.
  - `/assets/js/heritage-catalog.js` — loads categories/products into `window.CATALOG` so your existing cart UI can use it.
- If a page contains a product creation `<form>`, it is auto‑tagged `id="artisanProductCreateForm"` and wired to `products/create`.
- `admin/users.php` and `admin/analytics.php` now render live data.

## Notes
- The backend expects your existing MySQL tables exactly as in your `schema.sql`. If you changed the schema, adjust `/api/*.php` queries accordingly.
- Payments are **simulated** (no external gateway by design). You’ll still get `orders` + `payments` rows with status `paid`.
- Images: Apache must be allowed to write into `/storage/uploads`. Use the chmod above if you see upload errors.
- Security: only the **first** admin can be created automatically. After that, all registrations default to *Customer* or *Artisan*.

## Troubleshooting
- **PDO driver missing**: enable `pdo_mysql` in XAMPP PHP extensions.
- **403 / unauthorized**: log in first; artisans can only edit their own products.
- **Uploads failing**: check folder permissions; ensure `file_uploads = On` in `php.ini`.

Enjoy! 🎉
