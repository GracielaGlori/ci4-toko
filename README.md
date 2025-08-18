# CI4 Toko - CodeIgniter 4 E-commerce Application

A simple e-commerce application built with CodeIgniter 4 framework for managing products.

## Features

- ✅ Product management (CRUD operations)
- ✅ Responsive Bootstrap design
- ✅ Database migrations
- ✅ Form validation
- ✅ Flash messages
- ✅ Clean MVC architecture

## Requirements

- PHP 7.4 or higher
- MySQL/MariaDB
- Composer
- CodeIgniter 4

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/GracielaGlori/ci4-toko.git
   cd ci4-toko
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure database**
   - Copy `env` to `.env`
   - Update database settings in `.env`:
   ```
   database.default.hostname = localhost
   database.default.database = ci4_toko
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

4. **Run migrations**
   ```bash
   php spark migrate
   ```

5. **Start development server**
   ```bash
   php spark serve
   ```

## Usage

- Visit `http://localhost:8080/products` to view all products
- Use the interface to create, edit, and delete products

## Project Structure

```
ci4-toko/
├── app/
│   ├── Controllers/
│   │   └── Product.php
│   ├── Models/
│   │   └── Product.php
│   ├── Views/
│   │   └── products/
│   │       ├── index.php
│   │       ├── create.php
│   │       ├── edit.php
│   │       └── show.php
│   └── Database/
│       └── Migrations/
│           └── 2025-07-18-072425_CreateProducts.php
├── public/
├── writable/
└── vendor/
```

## Database Schema

**Products table:**
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- name (VARCHAR 255)
- description (TEXT)
- price (DECIMAL 10,2)
- stock (INT)
- created_at (DATETIME)
- updated_at (DATETIME)

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open source and available under the [MIT License](LICENSE).
