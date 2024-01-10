# Restaurant-Management-System-RMS-

The Restaurant Management System is a web-based application developed using PHP. It provides a comprehensive solution for managing various aspects of a restaurant, including menu management, order processing, table reservations, customer management, and more.

## Features

- **Menu Management**: Easily manage the restaurant menu by adding, updating, and removing dishes, along with their prices and descriptions.
- **Order Processing**: Efficiently process customer orders, track their status, and generate invoices.
- **Table Reservations**: Allow customers to make table reservations online, and keep track of reserved tables.
- **Customer Management**: Maintain a database of customer information, including contact details and order history.
- **Inventory Management**: Track inventory levels and receive notifications for low stock items, helping to manage ingredient replenishment.
- **Reporting and Analytics**: Generate reports on sales, revenue, popular dishes, and other key performance indicators to gain insights into the restaurant's performance.
- **User Roles and Permissions**: Assign different roles to staff members, such as administrators, managers, and waitstaff, with varying levels of access and permissions.

## Prerequisites

Before running the application, ensure that the following prerequisites are met:

- PHP 7.2 or higher
- MySQL or another compatible database management system
- Web server 

## Installation

1. Clone the repository or download the source code to your local machine.
```
https://github.com/edenzewdu/Restaurant-Management-System-RMS-
```

2. Import the database schema located in the `database` folder into your MySQL database.

3. Update the database configuration file `config.php` with your database credentials.

4. Start your web server and ensure it is configured to run PHP.

5. Access the application using a web browser by navigating to `http://localhost/restaurant-management-system`.

## Google API Configuration
To enable "Login with Google" functionality, you need to configure Google API authentication. Follow the instructions below:

1. Go to the Google Cloud Console.

2. Create a new project by clicking on the project dropdown at the top of the page and selecting "New Project". Enter a name for your project and click "Create".

3. In the left sidebar, click on "APIs & Services" and then select "Credentials".

4. Click on the "Create Credentials" button and choose "OAuth client ID" from the dropdown.

5. Select "Web application" as the application type.

6. Enter a name for the OAuth client ID, such as "Restaurant Management System".

7. Add the authorized redirect URIs. For the "Login with Google" functionality, you'll need to add the URL where your application handles the Google authentication callback. It is usually http://localhost/restaurant-management-system/auth/google/callback for a local setup. Modify the URL according to your domain and application structure.

8. Click on "Create" to generate the OAuth client ID and client secret.

9. Copy the generated client ID and client secret, and update the configuration file of your application (config.php in this case) with the respective values.

10. In your application code, implement the Google authentication flow using the Google API client library for PHP. You can find detailed documentation and code examples in the Google API PHP Client GitHub repository.

11. Test the "Login with Google" functionality by registering a new account or logging in with an existing account using the Google authentication option.

## Usage

- Register an account and log in to the system.
- Explore the different sections of the application, such as menu management, order processing, table reservations, and customer management.
- Create and manage menus, process customer orders, handle table reservations, and maintain customer records.
- Generate reports to monitor sales, revenue, and other important metrics.

## Contributing

Contributions to the Restaurant Management System are welcome! If you find any bugs, have feature suggestions, or would like to contribute enhancements, please submit an issue or a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

## Acknowledgements

- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
