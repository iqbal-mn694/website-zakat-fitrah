
# Website Distribusi Zakat Fitrah

A modern hotel booking management system built with **Laravel 12**, designed to handle reservations, room management, and guest interactions. This project uses RESTful APIs and can optionally be integrated with React or Inertia.js.

---

## 🚀 Features

- Login
- Master Data Muzzaki
- Master Data Kategori Mustahik
- Pengumpulan Zakat Fitrah
- Distribusi Zakat Fitrah Warga
- Distribusi Zakat Fitrah Mustahik
- 🌐 API ready

---

## 🧰 Tech Stack

- **Laravel 12**
- MySQL / PostgreSQL
- Laravel Breeze / Jetstream (for auth)
- Tailwind CSS (optional)

---

## 📦 Installation

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/hotel-app.git
cd hotel-app
```

### 2. Install Dependencies

```bash
composer install
npm install 
npm run dev
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan sesuaikan dengan database lokalmu:

```env
DB_DATABASE=zakat
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrate & Seed

```bash
php artisan migrate --seed
```

### 5. Run the App

```bash
php artisan serve
```

---

## 🔐 Authentication

Install Laravel Breeze (opsional):

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

---

## 🧪 Testing

```bash
php artisan test
```

---

## 📁 Folder Structure (Ringkas)

```
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
├── Models/
routes/
├── api.php
├── web.php
resources/
├── views/
├── js/ (if using React)
database/
├── migrations/
├── seeders/
```

---

## ⚙️ Deployment

1. Set environment `.env` untuk production
2. Jalankan `php artisan config:cache`
3. Gunakan server seperti Forge / Laravel Vapor atau VPS dengan Nginx

---

## 📄 License

MIT © 2025 YourName
