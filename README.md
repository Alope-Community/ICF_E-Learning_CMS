# Laravel Backend Project EDUVERSE

This is the backend part of the project built using the [Laravel framework](https://laravel.com/).

## Prerequisites

Before you start, ensure you have the following installed on your machine:

-   [PHP](https://www.php.net/) (Recommended version 8.0 or higher)
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/) or any other database you're using (e.g., PostgreSQL)
-   [Laravel](https://laravel.com/docs) (if not installed globally, install via Composer)

## Getting Started

Follow these steps to get the Laravel project running on your local machine.

### Step 1: Clone the Repository

Clone the Laravel backend repository to your local machine:

```bash
git clone https://github.com/Alope-Community/ICF_E-Learning_CMS.git
cd your-project
```

### Step 2: Install Dependencies

Run the following command to install all the necessary dependencies for the Laravel project:

```bash
composer install
```

and run command after "composer install"

```bash
npm install
# if error you need run
npm install --legacy-peer-deps
```

### Step 3: Set Up Environment Variables

Laravel uses an .env file for environment-specific settings (such as database credentials, API keys, etc.). Copy the .env.example file to create your .env file:

```bash
cp .env.example .env
```

### Step 4: Generate Application Key

Laravel requires an application key for encryption. Run the following command to generate a new application key:

```bash
php artisan key:generate
```

### Step 5: Run Database Migrations (If Applicable)

If the project requires database migrations and seeder, run the following command to migrate the database:

```bash
php artisan migrate:fresh --seed
```

### Step 6: Serve the Application

To start the Laravel development server, run the following command:

```bash
php artisan serve
```

And in another terminal, run the following command to start the Vite development server:

```bash
npm run dev
```

### Seeder for the login that has been provided

1. Admin
   email: admin@gmail.com
   password: foobarrr

2. Teacher
   email: teacher@gmail.com
   password: foobarrr

3. Student
   email: student@gmail.com
   password: foobarrr
