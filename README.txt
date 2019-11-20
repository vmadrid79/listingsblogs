# listingsblogs
PHP core MVC API test webapp - add listings via webForm, add posts via CRUD operations, ajax handles server requests
Created with core PHP 7.3.9, jQuery Ajax, and SQL(MySql DB).
NOTE: Not much effort was put into the front end design as focus was on the backend.

# requirements and setup
PHP 7+, XAMPP
Download repository and all files into htdocs directory.
 - Windows path will be something like ~/xampp/htdocs/listingsblogs
 - Ubuntu path should be /opt/lampp/htdocs/listingsblogs

# Database setup using db.sql
Using PhpMyAdmin, import the db.sql file OR manually run the code to generate the DB, Tables, and insert some test data

DB and Table structure
   bloglistings(DB)
	categories
	cities
	posts
	propertylistings
	propertytypes

# Directories
API		- API CRUD PHP handlers
Controller	- Contains API, Home, Listings controllers including Controller.php(base/parent) 
includes
  classes	- Database, Route classes(DB trait not used)
Models		- Post, Listing Model classes
Views		- Home, Listings Views along with
  Layouts	- Header and Footer

# Root directory
index.php	- Auto-loads the Database and Route classes from ~/include/classes/ and loads Routes.php
Routes.php	- Webapp URL and API CRUD Routes

# Web app URLs
Home page - loads web form used to add new property listings
http://localhost/listingsblogs
NOTES: 
Some form validation is done on the front end(focus was more on back-end).
Listing.php Model runs a isDuplicate() check against some of the submitted fields.
If a duplicate is found, the process fails and a message is returned to the Listing View.
*Full form validation and formatting is required.

Listings page - loads a list of all the property listings
http://localhost/listingsblogs/listings

# API CRUD request for test blogs, use Postman for testing
http://localhost/listingsblogs/create
JSON data required for Create operation
{
  "title":"Travel Post New",
  "body" :"This is a sample new post. blah blah blah...",
  "author" : "John Doe",
  "category_id": "2"
  "category_name": "Travel"
}

http://localhost/listingsblogs/read
Reads all the data in Posts table
http://localhost/listingsblogs/read_single?id=10
Reads a single record from the Posts table

http://localhost/listingsblogs/update
JSON data required for Create operation
{
  "id" : 10
  "title":"Travel Post New",
  "body" :"This is a sample new post. blah blah blah...",
  "author" : "John Doe",
  "category_id": "2"
  "category_name": "Travel"
}

http://localhost/listingsblogs/delete
JSON data required for Create operation // "id" required!
{
  "id" : 10 
  "title":"Travel Post New",
  "body" :"This is a sample new post. blah blah blah...",
  "author" : "John Doe",
  "category_id": "2"
  "category_name": "Travel"
}



