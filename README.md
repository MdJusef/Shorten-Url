## Planning Documentation

**Project Name:** URL Shortener
**Technologies:**
**Backend:** Laravel (PHP framework)
**Database:** MySQL
**Frontend:** ReactJS (JavaScript library)

**Project Structure:**
backend (Laravel application)
frontend (React application)
public (assets accessible to both frontend and backend)
**Database Design:** (Entity-Relationship Diagram)
Shortlinks table:
id (INT, primary key)
real_link (VARCHAR(255), unique)
short_code (VARCHAR(255), unique)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
**Functionality:**
Users visit the application and paste their long URL into an input field.
Upon submission, the long URL is sent to the backend API.
**The backend:**
Validates the input URL.
If valid, checks if the URL already exists in the database.
If new, generates a unique short code using a suitable algorithm (e.g., base62 encoding).
Stores the long URL and short code in the database.
Returns the short code to the frontend.
The frontend displays the generated short code, allowing users to copy it.
When a user visits a shortened URL (e.g., http://yourdomain.com/s/<short_code>), the backend:
Resolves the short code to the original long URL using the database.
Redirects the user to the long URL.

**Project Setup:**
Create a new Laravel project: laravel new Shorten-Url
Navigate to the project directory: cd Shorten-Url
**Database Setup:**

Model Creation:
Generate the Shortlink model: php artisan make:model Shortlink -m
Run the migration: php artisan migrate

**Controller Creation:**
Generate the UrlController to handle API requests: php artisan make:controller ShortLinkController
API Endpoints:
Implement an endpoint (e.g., POST /api/generate-shorten-link-url) in ShortLinkController to handle URL shortening requests.
Use Laravel's validation rules to validate the input URL.
Check for existing URLs in the database using the Shortlink model's query methods.
Generate a unique short code using a suitable algorithm (e.g., base62 encoding).
Create a new Url instance with the long URL and short code.
Save the Url to the database.
Return the generated short code in the API response.
Implement another endpoint (e.g., GET /generate-shorten-link) to handle URL redirection.
Resolve the short code to the original long URL using the Shortlink model's query methods.
Return a 302 (Found) HTTP redirect response with the long URL in the Location header.

