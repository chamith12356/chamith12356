<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body style="background-color:#EBECF0">
    <div class="container" align="center">
        <table>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <h1 class="display-1" style="color:blue">Item Registration</h1>
                </br></br>
                <thead>

                    <td><b> Item code :</b> </td>
                    <td></br> <input type="text" name="Itemcode" class="text-primary"></td>
                    </tr>
                    <tr>
                        <td> <b> Item name : </b></td>
                        <td> </br> <input type="text" name="Itemname" class="text-primary"></td>
                    </tr>
                    <tr>
                        <td> <b> Item category :</b></td>
                        <td></br> <input type="text" name=" Itemcategory" class="text-primary"> </td>

                    </tr>
                    <tr>
                        <td> <b> Item sub category :</b></td>
                        <td></br> <input type="text" name=" Itemsubcategory" class="text-primary"> </td>
                    </tr>
                    <tr>
                        <td> <b> Quantity :</b></td>
                        <td></br> <input type="text" name="Quantity" class="text-primary"> </td>
                    </tr>
                    <tr>
                        <td><b> Unit price :</b></td>
                        <td></br> <input type="text" name="Unitprice" class="text-primary"> </td>
                    </tr>

                    <tr>
                        <td></br> <input type="reset" value="Reset" name="res" class="text-success"></td>
                        <td align="right"></br> <input type="submit" value="Submit" name="Submit" class="text-danger">
                        </td>
                    </tr>
            </form>
            </thead>
        </table>
    </div>
</body>

</html>
<div class="container" align="center">
    <?php
    if (isset($_POST['Submit'])) {
        if (empty($_POST["Itemcode"])) {
            echo '<span class="text-danger">Item code  is required</span>';
        } elseif (empty($_POST["Itemname"])) {
            echo '<span class="text-danger">Item name is required</span>';
        } elseif (empty($_POST["Itemcategory"])) {
            echo '<span class="text-danger">Item category  is required</span>';
        } elseif (empty($_POST["Itemsubcategory"])) {
            echo '<span class="text-danger">Item sub category is required</span>';
        } elseif (empty($_POST["Quantity"])) {
            echo '<span class="text-danger">Quantity  is required</span>';
        } elseif (empty($_POST["Unitprice"])) {
            echo '<span class="text-danger">Unitprice is required</span>';
        } else {


            $Itemcode = $_POST['Itemcode'];
            $Itemname = $_POST['Itemname'];
            $Itemcategory = $_POST['Itemcategory'];
            $Itemsubcategory = $_POST['Itemsubcategory'];
            $Quantity = $_POST['Quantity'];
            $Unitprice = $_POST['Unitprice'];

            $conn = new mysqli('localhost', 'root', '', 'db');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price) 
    VALUES ('$Itemcode', '$Itemcategory', '$Itemsubcategory','$Itemname',  '$Quantity', '$Unitprice')";


            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            header("Location: Report.php");
        }
    }
    ?>
</div>