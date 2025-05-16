# Laravel Blog with Role-Based Access & OAuth Login

A modern Laravel blog application featuring robust role-based access control (RBAC) with [Spatie Laravel Permission](https://github.com/spatie/laravel-permission), OAuth login via Google and GitHub using [Laravel Socialite](https://laravel.com/docs/socialite), and a clean, responsive UI built with Tailwind CSS.

---

## 🚀 Features

- **OAuth Authentication**: Secure login with Google & GitHub
- **Role-Based Access Control**: Three roles - Admin, Editor, Reader
  - **Admin**: Full control (manage posts, comments, and user roles)
  - **Editor**: Manage posts (create, edit, delete)
  - **Reader**: View posts, add comments
- **Blog Functionality**: Create, edit, delete, and paginate posts
- **Comments**: Engage with posts via comments
- **Dark Mode**: Toggleable dark/light theme
- **UI**: Built with Tailwind CSS & Blade components

---

## 🛠️ Installation

1. **Clone the Repository**
    ```
    git clone https://github.com/pavithkulathunga/blog-posts.git
    ```

2. **Install Dependencies**
    ```
    composer install
    npm install && npm run dev
    ```

3. **Configure Environment**
    - Copy `.env.example` to `.env`:
      ```
      cp .env.example .env
      ```
    - Update your `.env` file:
      ```
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

4. **Generate Application Key**
    ```
    php artisan key:generate
    ```

5. **Run Migrations & Seeders**
    ```
    php artisan migrate --seed
    ```

6. **Serve the Application**
    ```
    php artisan serve
    ```

---

## 💡 Usage

- **Login/Register**: Use Google or GitHub OAuth.
- **Role Capabilities**:
  - `admin`/`editor`: Create, edit, and delete posts.
  - `reader`: View posts and add comments.
- **Role Assignment**: Assign roles via Tinker or an admin panel.
- **Dark Mode**: Toggle using the UI button.

---

## 🧑‍💻 Assigning Roles

Assign a role to a user using Laravel Tinker:
    ```
    $user = App\Models\User::find(1);
$user->assignRole('admin');
    ```


---

## 🏗️ Technologies

- Laravel 10+
- Spatie Laravel Permission
- Laravel Socialite (Google, GitHub)
- Tailwind CSS
- Blade Templates

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Please open an issue or submit a pull request.

---

## 📝 License

This project is open-source and available under the [MIT license](LICENSE).

---

> For more details, see the [Spatie Laravel Permission documentation](https://github.com/spatie/laravel-permission) and [Laravel Socialite documentation](https://laravel.com/docs/socialite).


