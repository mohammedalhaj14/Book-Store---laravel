# 📚 Bookstore AI Assistant (BookBot)

**BookBot** is a high-performance bookstore management system featuring an integrated AI assistant. Built on **Laravel 9**, it leverages the **Gemini 3 Flash** model to provide real-time book recommendations, inventory inquiries, and literary guidance.

## 🌐 Live Demo
**👉 [https://bookstore-demo.infinityfree.io](https://bookstore-demo.infinityfree.io)**

> The demo is hosted on a free hosting plan, so the first load may be slow.

## 🌟 Key Features

* **🤖 Smart AI Clerk:** Uses Google Gemini 3 Flash to act as a knowledgeable bookstore assistant.
* **📖 Catalog Management:** Full CRUD system for books, categories, and authors.
* **💬 Modern Chat UI:** Responsive interface with real-time status indicators and a "Clear Chat" history feature.
* **⚡ Optimized Performance:** Implements Laravel's latest caching for sub-second AI responses.
* **💾 Database Backup:** Includes a pre-configured `.sql` file for quick data restoration.

## 🛠️ Technical Stack

* **Backend:** Laravel 9.x
* **Frontend:** Blade Templates, Bootstrap 5.3, Vanilla JavaScript (Fetch API)
* **AI Engine:** Google Generative AI (`gemini-3-flash-preview`)
* **Database:** MySQL 8.0+

## 🧠 Technical Challenges & Solutions

### 1. Handling Gemini 3 Thinking Levels

**Challenge:** Early integration led to "Unknown name 'thinking_level'" errors due to strict JSON payload requirements in the REST API.
**Solution:** Refined the `generation_config` structure to properly nest the `thinking_config` parameters, ensuring compatibility with the 2026 Gemini 3 API specifications.

### 2. Stateless Conversation History

**Challenge:** Maintaining context in a web environment without bloated database calls.
**Solution:** Implemented a lightweight session-based history management system that allows the AI to "remember" the last 5 exchanges while keeping latency low.

### 3. Deploying the Chatbot Route on Free Hosting

**Challenge:** The AI chat endpoint returned a 403 error on the free hosting provider, even though it worked locally.
**Solution:** The provider blocks URLs containing the word "chat". Renaming the route (while keeping its internal name) resolved the issue.

## 🚀 Getting Started

### Prerequisites

* PHP 8.1 or higher
* Composer
* A Google AI Studio API Key

### Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/mohammedalhaj14/Book-Store---laravel.git
   cd Book-Store---laravel
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
   Open `.env` and set your `GEMINI_API_KEY` and local database credentials.

4. **Database Initialization**
   ```bash
   php artisan migrate
   # Optional: import the provided .sql file into your MySQL client
   ```

5. **Run Application**
   ```bash
   php artisan serve
   ```

## 📄 License

Distributed under the MIT License. See `LICENSE.md` for more information.
