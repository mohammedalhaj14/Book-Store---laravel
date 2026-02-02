# 📚 Bookstore AI Assistant (BookBot)

**BookBot** is a high-performance bookstore management system featuring an integrated AI assistant. Built on **Laravel 12**, it leverages the **Gemini 3 Flash** model to provide real-time book recommendations, inventory inquiries, and literary guidance.

## 🌟 Key Features

* **🤖 Smart AI Clerk:** Uses Google Gemini 3 Flash to act as a knowledgeable bookstore assistant.
* **📖 Catalog Management:** Full CRUD system for books, categories, and authors.
* **💬 Modern Chat UI:** Responsive interface with real-time status indicators and a "Clear Chat" history feature.
* **⚡ Optimized Performance:** Implements Laravel's latest caching and routing optimizations for sub-second AI responses.
* **💾 Database Backup:** Includes a pre-configured `.sql` file for quick data restoration.

## 🛠️ Technical Stack

* **Backend:** Laravel 12.x
* **Frontend:** Blade Templates, Bootstrap 5.3, Vanilla JavaScript (Fetch API)
* **AI Engine:** Google Generative AI (`gemini-3-flash-preview`)
* **Database:** MySQL 8.0+

## 🚀 Getting Started

### Prerequisites

* PHP 8.2 or higher
* Composer
* A Google AI Studio API Key

### Installation

1. **Clone the Repository**
```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
cd bookstore-chatbot

```


2. **Install Dependencies**
```bash
composer install

```


3. **Configure Environment**
```bash
cp .env.example .env
php artisan key:generate

```


*Open `.env` and set your `GEMINI_API_KEY` and local database credentials.*
4. **Database Initialization**
```bash
php artisan migrate
# Optional: Import database/backups/database.sql into your MySQL client

```


5. **Run Application**
```bash
php artisan serve

```

## 📄 License

Distributed under the MIT License. See `LICENSE.md` for more information.

---
