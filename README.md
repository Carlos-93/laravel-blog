<img src="https://github.com/Carlos-93/laravel-blog/blob/main/public/favicon.png?raw=true" width="150">

# Welcome to My Blog in Laravel

This project is a blog developed with the Laravel framework, designed to showcase Laravel's capabilities for building robust and scalable web applications. Here you will find how to configure and run the project locally, as well as a basic guide to contributing to it.

## Characteristics

- CRUD (Create, Read, Update, Delete) of posts
- Authentication system
- Comments on posts
- Categories and tags for posts

## Previous requirements

To run this project, you will need to have the following installed on your system:

- PHP >= 7.3
- Composer
- Node.js and NPM
- A compatible database (MySQL, PostgreSQL, SQLite, SQL Server)

## Installation

1. Clone the repository to your local machine:
    ```bash
    git clone https://github.com/Carlos-93/laravel-blog.git
    ```
2. Change into the project directory:
    ```bash
    cd laravel-blog
    ```
3. Install PHP dependencies:
    ```bash
    composer install
    ```
4. Install NPM packages:
    ```bash
    npm install && npm run dev
    ```
5. Copy `.env.example` to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```
    Make sure to set up your database connection details in the `.env` file.

6. Generate an application key:
    ```bash
    php artisan key:generate
    ```
7. Run the migrations and seed the database (optional):
    ```bash
    php artisan migrate --seed
    ```
8. Start the local development server:
    ```bash
    php artisan serve
    ```
    You should now be able to access the application at http://localhost:8000.

## Usage

After installation, you can start using the blog by registering a new user account. Once logged in, you can create, read, update, and delete posts. You can also categorize posts and comment on them.

## Contributing

Contributions are welcome, and any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".

Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Contact

Carlos Araujo Galván

- carlos93.bcn@hotmail.com
- https://www.linkedin.com/in/carlos-araujo-galvan

Project Link: [https://github.com/Carlos-93/laravel-blog](https://github.com/Carlos-93/laravel-blog)
