# Online-Grocery-Store
This project has been divided in to two modules namely admin module and customer/user module. Administrator- When the web user sign in as an administrator, he/she acquires the access rights to add new brands, add new products, delete the existing product and can also update the existing product details. User-All users can view the homepage of the website, for a user to purchase any product he/she needs to be registered and have an online account. If the user had already registered on the website and have an account, he/she needs to provide login credentials and login before making any purchases or adding a product to cart.
The major functionalities supported by the project are:

1. Design: The front-end design is implemented using HTML, CSS, Java Script, Bootstrap
and jQuery and the Backend has been implemented using PHP and MySQL.

2. Navigation Menu: Each Page has a navigation menu that lets the users search grocery items,
navigate to home page, log in/out, access the shopping cart and view the purchase history.

3. Registration page: This page lets the user register to the website after checking for the
following criteria:
• Check if the username is already registered in the system by making ajax calls.
• Check if all the mandatory fields are filled out.
• Check if the password is strong enough (it must be 8 characters long, contain one capital alphabet, 1 numeric, 1 special character). Password is stored in its hashed version in the
database.

4. Login page: It lets a registered user login in after verifying the credentials (username, password) and passes the username in session id to other related pages that will help render appropriate view for admins and users.

5. Home Page: The home page has the 3 categories of grocery items mentioned above to choose from. Filtration has been used to separate the categories in this page. Once a category is selected, users can view the list of grocery items on the page. It uses pagination to list the grocery items. 

6. Search Grocery item: Search on an item can be performed by filtering on category. Search and filtering is integrated together.

7. Cart Page: It shows the items currently in the shopping cart ready to be purchased. User
can update the quantities or remove items from the cart. Once the items are checked out, order is placed, and user is notified.

9. History Page: It lists all the purchases made till date by the user. 
