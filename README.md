# ARCHIVING SYSTEM

![logo](https://raw.githubusercontent.com/uhrzel/archiving-system/main/public/img/preview.PNG)

## Installation Guide

### Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js
-   npm

### Installation Steps

1. Clone the repository:

    ```bash
    git clone https://github.com/uhrzel/Archiving-System.git
    ```

2. Navigate into the project directory:

    ```bash
    cd Archiving-System
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install && npm run dev
    ```

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations:

    ```bash
    php artisan migrate
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

If you encounter any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request. Thank you for your interest and support!
