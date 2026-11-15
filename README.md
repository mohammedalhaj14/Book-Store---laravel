# 📚 Bookstore AI Assistant (BookBot)

**BookBot** is a bookstore management system with an integrated AI assistant. Built on **Laravel 9**, it uses the **Gemini 3 Flash** model to provide book recommendations, inventory lookups, and customer support through a chat interface.

## 🌐 Live Demo
**👉 [https://bookstore-demo.infinityfree.io](https://bookstore-demo.infinityfree.io)**

> Hosted on a free plan — first load may be slow.

## 🌟 Features

* **AI Shop Assistant** — Google Gemini 3 Flash answers questions about the catalog and recommends titles.
* **Catalog Management** — Full CRUD for books, categories, and authors, including cover image uploads.
* **Shopping Cart & Checkout** — Add to cart, manage quantities, and complete orders.
* **Admin Dashboard** — Order tracking, inventory stats, and customer management.
* **Responsive UI** — Bootstrap 5.3 with a custom chat widget and real-time status indicators.

## 🛠️ Tech Stack

* **Backend:** Laravel 9
* **Frontend:** Blade, Bootstrap 5.3, vanilla JavaScript (Fetch API)
* **AI:** Google Generative AI (`gemini-3-flash-preview`)
* **Database:** MySQL

## 🚀 Getting Started

### Prerequisites

* PHP 8.1 or higher
* Composer
* A Google AI Studio API key

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/mohammedalhaj14/Book-Store---laravel.git
   cd Book-Store---laravel
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure the environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Open `.env` and set your `GEMINI_API_KEY` and database credentials.

4. **Set up the database**
   ```bash
   php artisan migrate
   # Optional: import the provided .sql file into your MySQL client
   ```

5. **Run the app**
   ```bash
   php artisan serve
   ```

## 📄 License

Distributed under the MIT License. See `LICENSE.md` for details.
