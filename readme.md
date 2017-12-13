Simple API REST + Simple Admin
Version Alpha

Using Lumen, Facades, Eloquent, Bootstrap and Ajax

================================

To install and test in project folder do:

composer install

configure database in .env

php artisan migrate

php -S localhost:8000 -t public

===============================

Endpoints:

Create
POST /api/v1/candidates
curl -i -X POST -H "Content-Type:application/json" http://localhost:8000/api/v1/candidates -d '{"name":"Albert Einstein", "age":"138"}'

Edit
PUT /api/v1/candidates/1
curl -H "Content-Type:application/json" -X PUT http://localhost:8000/api/v1/candidates/1 -d '{"name":"Leonardo Da Vinci", "age":"565"}'

List All
GET /api/v1/candidates
curl http://localhost:8000/api/v1/candidates

View Details
GET /api/v1/candidates/1
curl http://localhost:8000/api/v1/candidates/1

Delete
DELETE /api/v1/candidates/1
curl -X DELETE http://localhost:8000/api/v1/candidates/1

===============================

Still need to be done:

Auth
Pagination
Docs
Filter
Sort
Search
Fields
Rate limit
Error treatment
HTTP status codes
