
## Summary of the PHP Project

### Overview

This project is Designed with custom lightweight PHP framework to handle a RESTful API for submitting product reviews. Inspired by larger frameworks like Laravel, this framework emphasizes simplicity and modularity, breaking down the application into distinct components such as request handling, controllers, models, and database interactions.

## How to Run:
-  clone from github to your server.
```
git clone https://github.com/MahmudsGit/product-review.git
```
-  create a new database and configure with `confif/database.php`. for exapmple :
```html
    'host' => 'localhost',
    'database' => 'product_reviews_db',
    'username' => 'root',
    'password' => ''
```
-  open terminal and cd to public
```
cd public
```
-  run server
```
php -S localhost:8000
```
-  open postman or insomnia and hit enter whith json data 
**json**:
```html
{
    "product_id": 1,
    "user_id": 1,
    "review_text": "Great product!"
}
```
**url**:
```
http://localhost:8000/review
```
**type**: `POST`

**view response**

##

### Components

1. **Request Handling**: Captures and processes incoming HTTP requests and decodes JSON payloads.
2. **Routing**: Directs requests to the appropriate controller actions based on the URL and HTTP method.
3. **Controllers**: Encapsulate the logic to process requests and generate responses.
4. **Validation and Sanitization**: Validates incoming data to ensure it meets predefined rules before processing.
5. **Models**: Interact with the database to perform CRUD operations.
6. **Database Connection**: Manages connections to the MySQL database using PDO.
7. **Responses**: Sends structured JSON responses to the client, including status codes and messages.

### How It Works

- **Routing and Dispatching**: The framework uses a `Router` to map URLs to controller methods. It identifies the request path and method, then delegates the request to the corresponding controller action.
  
- **Request and Response Handling**: Requests are captured and decoded into a PHP array. The framework then validates the data, and if valid, processes it through the appropriate controller.

- **Validation**: Data validation ensures that all required fields are present and correctly formatted. Errors are captured and returned to the client if the validation fails.

- **Database Operations**: The framework connects to a MySQL database to persist data. The `Review` model handles the insertion of review data into the `product_reviews` table.

### Description of the Review Endpoint

**Endpoint**: `/review`

**Method**: `POST`

**Purpose**: To allow users to submit reviews for products.

**Request Body**: Expects a JSON payload containing:
- `product_id`: An integer representing the product being reviewed.
- `user_id`: An integer representing the user submitting the review.
- `review_text`: A string containing the review text.
- Example: -

**Validation Rules**:
- `product_id` and `user_id` must be numeric.
- `review_text` must be non-empty.

**Process**:
1. The request is routed to the `ReviewController`'s `store` method.
2. The `ReviewRequest` class validates the input data.
3. If validation passes, the `Review` model saves the review data to the database.
4. The server responds with a JSON message indicating success or failure.

**Response**:
- **Success**: Returns a 200 OK status with a message and the review data.
- **Validation Failure**: Returns a 400 Bad Request status with validation error messages.
- **Database Failure**: Returns a 500 Internal Server Error status if saving to the database fails.

