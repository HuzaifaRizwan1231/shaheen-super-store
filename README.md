# Shaheen Super Store

Shaheen Super Store is a full-featured e-commerce website where users can browse products, view product details, add items to their cart, complete orders, and view their order history. Additionally, there is an admin panel for managing products, categories, brands, and users.

## Features

### User Side
- **User Authentication**: Users can sign up and log in.
- **Product Browsing**: Browse through various products available in different categories.
- **Product Details**: View detailed information about each product.
- **Shopping Cart**: Add products to the cart and view the cart.
- **Order Placement**: Complete the order by proceeding through the checkout process.
- **Order History**: View past orders and their details.

### Admin Side
- **Admin Authentication**: Admin can log in to access the dashboard.
- **Product Management**: Add, edit, and delete products.
- **Category Management**: Add, edit, and delete categories.
- **Brand Management**: Add, edit, and delete brands.
- **User Management**: View and delete users.

## Project Setup

Follow these steps to set up the project locally.

### Prerequisites

- PHP installed on your machine.
- A web server like Apache or Nginx.
- MySQL database.

### Steps

1. **Clone the repository**

   ```bash
   git clone https://github.com/HuzaifaRizwan1231/shaheen-super-store.git
   cd shaheen-super-store
   ```

2. **Set up the Database**

   - Create a new MySQL database.
   - Import the provided SQL file to set up the database schema and initial data.

   ```sql
   CREATE DATABASE shaheen_super_store;
   USE shaheen_super_store;
   SOURCE path/to/shaheen_super_store.sql;
   ```

3. **Upload the SQL File to the Database**

   - Open your MySQL database management tool (e.g., phpMyAdmin).
   - Select the `shaheen_super_store` database.
   - Use the import feature to upload the `DatabaseFile/id21367706_ecommerce_website.sql` file located in the project directory.

4. **Configure the Application**

   - Open the `includes/connect.php` file in the root directory.
   - Update the database connection details:

   ```php
   $db_host = 'your_database_host';
   $db_name = 'shaheen_super_store';
   $db_user = 'your_database_user';
   $db_pass = 'your_database_password';
   ```

5. **Start the Web Server**

   - Place the project folder in the web server's root directory (e.g., `htdocs` for XAMPP).
   - Start your web server.

6. **Access the Application**

   - Open your web browser and go to `http://localhost/shaheen-super-store` to access the user side.
   - For the admin side, go to `http://localhost/shaheen-super-store/admin`.

## Usage

- **User Side**: Sign up or log in to start browsing and purchasing products.
- **Admin Side**: Use admin credentials to log in and manage the store's products, categories, brands, and users.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

## Contact

If you have any questions or need further assistance, please contact [huzaifa.rizwan1231@gmail.com](mailto:huzaifa.rizwan1231@gmail.com).

---

Thank you for visiting Shaheen Super Store!
