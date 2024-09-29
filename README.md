# todo-api
Todo Api task
# Todo List API

## Setup

1. Clone the repository.
2. Run `composer install`.
3. Set up your `.env` file with database credentials.
4. Run `php artisan migrate` to set up the database.
5. Install Passport using `php artisan passport:install`.

## API Endpoints

### Authentication

- `POST /api/register`: Register a new user.
- `POST /api/login`: Log in and receive an access token.
- `POST /api/logout`: For Logout (requires token).

### Tasks

- `GET /api/tasks`: Retrieve all tasks 
- `GET /api/tasks/{id}`: Retrieve a specific task.
- `GET /api/tasks/{id}/edit`: Retrieve a specific task with edit data.
- `POST /api/tasks`: Create a new task (requires token).
- `PUT /api/tasks/{id}/edit`: Update an existing task (requires token).
- `DELETE /api/tasks/{id}/delete`: Delete a task (requires token).

## Testing

You can use Postman to test the endpoints. Remember to include the token in the Authorization header for tasks-related endpoints.

