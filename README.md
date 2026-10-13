# DAW (Desenvolvimento de Aplicações Web)

## Final LAB, final project, e-commerce site for educational purposes

### Used Tools

* codeigniter
* Smarty
* Bootstrap


## How to run

The site is a CodeIgniter 3.1.6 app (in `LAB12/`) using Smarty templates and a MySQL/MariaDB database.
The original database dump is not in the repository, so `db/schema.sql` recreates the tables from the model code
and loads **invented sample products** (the pictures in `LAB12/imagens/` are the originals).

### With Docker (written but untested: Docker was not available where this was prepared)

```
docker compose up --build
```

Then open http://localhost:8080/. The image uses PHP 7.4 because CodeIgniter 3.1.6 does not support PHP 8.

### Without Docker (this is what was tested)

1. Create a MariaDB/MySQL database and user, then load `db/schema.sql` into it.
2. From the repository root:
   `DB_HOST=127.0.0.1 DB_USER=daw DB_PASSWORD=... DB_NAME=daw BASE_URL=http://127.0.0.1:8080/ php -S 127.0.0.1:8080 -t LAB12 tools/dev_router.php`
   (the router sets `CI_ENV=production`, which hides the PHP 8 deprecation notices that CodeIgniter 3.1.6 produces; without it, cookies/redirects break).
   `LAB12/application/views/templates_c` and `LAB12/application/logs` must be writable.

Database settings and the base URL come from the environment variables `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME`, `BASE_URL`.

### Known limitations
* Passwords are hashed with a truncated MD5 and SQL is built by string concatenation (SQL injection). This is the original coursework code and was not changed.
* Pages load Bootstrap, jQuery and fonts from CDNs.
* Smoke test covered: home page, a category page, the register and login pages, registration, login and add-to-cart (PHP 8.3 + MariaDB 10.11). Checkout/order history were not exercised.
