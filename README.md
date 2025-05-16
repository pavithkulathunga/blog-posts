# Laravel Blog with Role-Based Access and OAuth Login

This is a Laravel-based blog application featuring role-based access control using [Spatie Laravel Permission](https://github.com/spatie/laravel-permission) and OAuth login via Google and GitHub using [Laravel Socialite](https://laravel.com/docs/socialite).

## Features

- User authentication with OAuth (Google & GitHub)
- Role-based access control with three roles:
  - **Admin**: Full access to create, edit, delete posts and manage comments
  - **Editor**: Create, edit, delete posts
  - **Reader**: View posts and add comments
- CRUD operations for blog posts
- Comments on posts
- Dark mode support (toggle)
- Pagination for posts listing
- Clean UI with Tailwind CSS and Blade components

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/pavithkulathunga/blog-posts.git
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install && npm run dev
    ```

3. Create `.env` file and configure your database and OAuth credentials:
    ```env
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

    # OAuth credentials
    GOOGLE_CLIENT_ID=your_google_client_id
    GOOGLE_CLIENT_SECRET=your_google_client_secret
    GOOGLE_REDIRECT_URI=http://your-app-url/auth/google/callback

    GITHUB_CLIENT_ID=your_github_client_id
    GITHUB_CLIENT_SECRET=your_github_client_secret
    GITHUB_REDIRECT_URI=http://your-app-url/auth/github/callback
    ```

4. Run migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```

5. Serve the application:
    ```bash
    php artisan serve
    ```

## Usage

- Register or login using Google/GitHub OAuth.
- Users with `admin` or `editor` roles can create, edit, and delete posts.
- Readers can view posts and add comments.
- Admin can assign roles to users (can be done via Tinker or an admin panel).
- Toggle dark mode using the UI button (if implemented).

## Assigning Roles

Assign roles to users using Tinker:

```bash
php artisan tinker
