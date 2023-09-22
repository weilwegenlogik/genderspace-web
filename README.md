# genderspace-web 🌌

Welcome to `genderspace-web`. At its heart, this platform is a resource primarily built with transgender individuals in mind. While it's open to everyone within the LGBTQIA+ community 🏳️‍🌈, the features and tools are largely centered around the unique experiences of transgender folks.

## Proposed Features 🛠

### 1. **Voice Training System** 🎙

A simple, practical approach to:

-   Help users practice pronunciation.
-   Analyze elements like tone, pitch, and resonance.
-   Opportunities for peer feedback in the future.

### 2. **HRT Progress Tracker** ⏳

**Please Note**: This is an auxiliary tool and does not replace medical advice.

-   Users can log their HRT experiences over time.
-   Capture physical and emotional changes.
-   Option to track blood levels, compared to general benchmarks.

### 3. **Community Hub** 💬

A space for genuine connections and shared experiences:

-   Moderation tools to ensure a safe environment 🛡.
-   Users have the ability to report any concerns ⚠️.
-   Customizable profiles to express oneself 🎨.

### 4. **Discord Bot** 🤖

Still in the conceptual stage, aiming for better community integration.

## System Requirements 💻

Compatible with modern browsers like Chrome, Firefox, Safari, or OperaGX.

## Collaboration 🤝

If you're skilled in Android, iOS, or Flutter and resonate with this project, I'd appreciate collaboration. My work and progress can be tracked on [GitHub](https://github.com/weilwegenlogik).

## Privacy & Data 🔐

Rest assured, data privacy is paramount. Utilizing top-tier encryption and ensuring no direct identification. All servers are hosted in the EU for robust data protection.

## License 📜

This project is under a unique license. Any modifications or distributions must have explicit written permission.

## Installation (Ubuntu)
### Setting Up `genderspace-web` on Ubuntu

### Prerequisites:

Ensure you have the following installed:
- PHP (version 8.2)
- Composer
- Node.js (version 16)
- npm
- SQLite
- Git

```bash
sudo apt update
sudo apt install php8.2 php8.2-sqlite3 composer nodejs npm sqlite3 git
```

### Clone the Repository:

```bash
git clone https://github.com/weilwegenlogik/genderspace-web.git
cd genderspace-web
```

### Setup PHP & Composer:

Copy the environment configuration file:

```bash
cp .env.sqlite.ghactions .env
```

Install PHP dependencies:

```bash
composer install
```

Generate an application key:

```bash
php artisan key:generate
```

### Database Setup:

Create a SQLite database:

```bash
mkdir -p database
touch database/database.sqlite
```

Migrate the database:

```bash
php artisan migrate --force
```

### Setup Node.js & npm:

Install the Node.js dependencies:

```bash
npm install
```

Compile the assets:

```bash
npm run build
```

### Directory Permissions:

Ensure that the `storage` and `bootstrap/cache` directories are writable:

```bash
chmod -R 777 storage bootstrap/cache
```

### Running the Application:

You can use Laravel's built-in server to run the application:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser to see the running application.

### Additional Notes:

- If you encounter issues related to missing PHP extensions, you can install them using `apt`. For example, for the `dom` extension, you'd run `sudo apt install php8.2-xml`.
  
- Ensure you have the `doctrine/dbal` package installed for certain database operations:

```bash
composer require doctrine/dbal
```

