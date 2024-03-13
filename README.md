## Planning Documentation
<ul>
    <li><b>Project Name:</b> URL Shortener</li>
    <li><b>Backend:</b> Laravel (PHP framework)</li>
    <li><b>Database:</b> MySQL</li>
    <li><b>Frontend:</b> ReactJS (JavaScript library)</li>
</ul>

## Project Structure:
<p>backend (Laravel application)</p>
<p>frontend (React application)</p>
<p>public (assets accessible to both frontend and backend)</p>

## Database Design: (Entity-Relationship Diagram)
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

## Project Setup:
Create a new Laravel project: laravel new Shorten-Url
Navigate to the project directory: cd Shorten-Url

## Database Setup:

**Generate the Shortlink model:** <br>
<pre>php artisan make:model Shortlink -m</pre>
**Run the migration:** <br>
<pre>php artisan migrate</pre>

## Controller Creation:
Generate the UrlController to handle API requests: <pre>php artisan make:controller ShortLinkController</pre>
**API Endpoints:** <br>
Implement an endpoint (e.g., POST /api/generate-shorten-link-url) in ShortLinkController to handle URL shortening requests.
<ul>
    <li>Use Laravel's validation rules to validate the input URL.</li>
    <li>Check for existing URLs in the database using the Shortlink model's query methods.</li>
    <li>Create a new Url instance with the long URL and short code.</li>
    <li>Save the Url to the database.</li>
    <li>Return the generated short code in the API response.</li>
</ul>
<hr>

<p>Implement another endpoint (e.g., GET /generate-shorten-link) to handle URL redirection.
Resolve the short code to the original long URL using the Shortlink model's query methods.
Return a 302 (Found) HTTP redirect response with the long URL in the Location header. </p>

