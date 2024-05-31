# Comment API

This project is an API for comments. It is built using Laravel and uses MySQL for data storage.

## Installation

1. Enter the project:
    ```
    cd RestAPI
    ```
2. Build Docker Containers:
    ```
    docker-compose up -d --build
    ```
3. Enter the docker container:
    ```
    docker exec -it laravel_app_comment bash
    ```
4. Install Composer dependencies:
    ```
    composer install
    ```
5. Run the database migrations:
    ```
    php artisan migrate
    ```
6. Seed the database:
    ```
    php artisan db:seed
    ```

## API Endpoints

- `GET /comments`: Fetches a list of comments. The comments are paginated and each page contains 25 comments.
- `POST /comments`: Creates a new comment. The request body should contain the comment data.
- `GET /comments/search`: Searches for comments based on a query string.

## Models

### Comment

- `id`: Comment identifier (primary key).
- `user_name`: Name of the user who created the comment.
- `email`: Email of the user who created the comment.
- `home_page`: Home page of the user who created the comment (optional).
- `text`: Text of the comment.
- `parent_id`: Identifier of the parent comment (if it's a reply to another comment).
- `created_at`: Comment creation time.
- `updated_at`: Time of the last comment update.

## Tests

To run the tests, execute the following command:

    php artisan test

## Database Factories

Database factories are used to generate large amounts of database records for testing or seeding purposes. This project uses the `CommentFactory` for generating comment data.

### CommentFactory

The `CommentFactory` generates fake data for `Comment` model. It sets the `user_name`, `email`, `home_page`, `text`, `parent_id`, and `author_id` fields.

## Database Seeders

Database seeders are used to populate your database with records. This project uses the `CommentSeeder` to create comments.

### CommentSeeder

The `CommentSeeder` uses the `CommentFactory` to create a large number of comments.

To run the seeders, use the following command:

    php artisan db:seed

### Indexing table comments for Elasticsearch

To run the seeders, use the following command:

    php artisan comments:index

### GraphQL Endpoints

POST /graphql: Executes a GraphQL query or mutation. The request body should contain the GraphQL query or mutation.

### Models

Models

**Comment**
**id**: Comment identifier (primary key).
**user_name**: Name of the user who created the comment.
**email**: Email of the user who created the comment.
**home_page**: Home page of the user who created the comment (optional).
**text**: Text of the comment.
**parent_id**: Identifier of the parent comment (if it's a reply to another comment).
**created_at**: Comment creation time.
**updated_at**: Time of the last comment update.

### API collection for Postman

Import file with name **New Collection.postman_collection.json** to Postman