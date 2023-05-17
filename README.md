It appears that you have provided a piece of HTML code that includes multiple sections for customer registration, item registration, and report generation. These sections seem to be part of a web application where users can register as customers, register items, and generate reports.

The code includes the Bootstrap CSS framework and jQuery library for user interface styling and interactivity. It also utilizes PHP for server-side processing.

The first part of the code includes a dialog box that displays a welcome message when the page loads. It uses the jQuery UI library to create the dialog box.

The next part contains a form for customer registration. It includes fields for the customer's title, first name, last name, contact number, and district. On form submission, the PHP code processes the form data and inserts it into a database table named "customer." If the insertion is successful, it displays a success message; otherwise, it displays an error message.

After that, there is another section with a form for item registration. This form includes fields for the item code, item name, item category, item subcategory, quantity, and unit price. Similar to the previous form, the PHP code processes the form data and inserts it into a database table named "item."

Finally, there are two sections for generating reports. The first section allows users to select a start date and an end date and generate an invoice report based on the selected date range. The PHP code retrieves data from the "invoice" and "customer" tables and displays it in a table format.

The second report generation section is similar to the first one but generates an invoice item report. It retrieves data from the "invoice," "customer," "item," and "item_category" tables and displays it in a table format.

