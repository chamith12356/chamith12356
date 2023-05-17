<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body style="background-color:#EBECF0">

    <div class="container" align="center">
        <form method="POST" action="">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date">
            <input type="submit" value="Generate Report" name="generate_report">
        </form>
        <h2 class="display-2" style="color:gray">Invoice Report</h2>
        <?php

        $conn = new mysqli('localhost', 'root', '', 'db');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        if (isset($_POST['generate_report'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $sql = "SELECT invoice.invoice_no, invoice.date, customer.first_name, customer.last_name, customer.district, invoice.item_count, invoice.amount
            FROM invoice
            INNER JOIN customer ON invoice.customer = customer.id
            WHERE invoice.date BETWEEN '$start_date' AND '$end_date'";
        } else {
            $sql = "SELECT invoice.invoice_no, invoice.date, customer.first_name, customer.last_name, customer.district, invoice.item_count, invoice.amount
            FROM invoice
            INNER JOIN customer ON invoice.customer = customer.id";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-dark'>
                <tr>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Customer District</th>
                    <th>Item Count</th>
                    <th>Invoice Amount</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['invoice_no'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                    <td>" . $row['district'] . "</td>
                    <td>" . $row['item_count'] . "</td>
                    <td>" . $row['amount'] . "</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "No results found.";
        }

        $conn->close();
        ?>
    </div>


    </br>
    </br>


    <div class="container" align="center">
        <form method="POST" action="">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_dat">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_dat">
            <input type="submit" value="Generate Report" name="generate_repor">
        </form>
        <h2 class="display-2" style="color:green">Invoice Item Report</h2>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'db');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['generate_repor'])) {
            $start_date = $_POST['start_dat'];
            $end_date = $_POST['end_dat'];

            $sql = "SELECT i.invoice_no, i.date, c.first_name, c.last_name, item.item_name, item.item_code, item_category.category, item.unit_price
            FROM invoice i
            INNER JOIN customer c ON i.customer = c.id
            INNER JOIN invoice_master im ON i.invoice_no = im.invoice_no
            INNER JOIN item ON im.item_id = item.id
            INNER JOIN item_category ON item.item_category = item_category.id
            WHERE i.date BETWEEN '$start_date' AND '$end_date'";
        } else {
            $sql = "SELECT i.invoice_no, i.date, c.first_name, c.last_name, item.item_name, item.item_code, item_category.category, item.unit_price
            FROM invoice i
            INNER JOIN customer c ON i.customer = c.id
            INNER JOIN invoice_master im ON i.invoice_no = im.invoice_no
            INNER JOIN item ON im.item_id = item.id
            INNER JOIN item_category ON item.item_category = item_category.id";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<table class='table table-striped table-success'>
                <tr>
                    <th>Invoice number</th>
                    <th>Invoiced date</th>
                    <th>Customer name</th>
                    <th>Item name</th>
                    <th>Item code</th>
                    <th>Item category</th>
                    <th>Item unit price</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['invoice_no'] . "</td>
                    <td>" . $row['date'] . "</td>
                    <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                    <td>" . $row['item_name'] . "</td>
                    <td>" . $row['item_code'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td>" . $row['unit_price'] . "</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "No results found.";
        }

        $conn->close();
        ?>
    </div>
    <div class="container" align="center">
        </br>
        </br>

        <h2 class="display-2" style="color:blue">Item Report</h2>
        <?php

        $conn = new mysqli('localhost', 'root', '', 'db');


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $itemQuery = "SELECT id, item_name, item_category, item_subcategory, quantity FROM item";
        $itemResult = $conn->query($itemQuery);

        if ($itemResult) {
            echo "<table class='table table-striped table-info'> 
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Category</th>
            <th>Item Subcategory</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>";

            while ($row = $itemResult->fetch_assoc()) {
                echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['item_name'] . "</td>
            <td>" . $row['item_category'] . "</td>
            <td>" . $row['item_subcategory'] . "</td>
            <td>" . $row['quantity'] . "</td>
            <td>
                <button onclick='updateItem(" . $row['id'] . ")'>Update</button>
                <button onclick='deleteItem(" . $row['id'] . ")'>Delete</button>
            </td>
        </tr>";
            }

            echo "</table>";
        } else {
            echo "Error: " . $conn->error;
        }


        $itemResult->close();

        $conn->close();
        ?>

        <script>
            function updateItem(itemId) {
                console.log("Update item with ID: " + itemId);
            }

            function deleteItem(itemId) {
                console.log("Delete item with ID: " + itemId);
            }
        </script>

    </div>

</body>

</html>