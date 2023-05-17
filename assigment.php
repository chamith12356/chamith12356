<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <style>
        .ui-widget-header {
            background: black;
            color: blue;
            font-size: 20px;
        }

        #alertWindow {
            background-color: blue;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

</head>


<body style="background-color:#EBECF0">
    <script>
        $(function () {
            $("#alertWindow").dialog({
                modal: true,
                draggable: false,
                resizable: false,
            });
        });
    </script>
    <div id="alertWindow" title="Alert Box">
        <h1>Welcome to the Site!</h1>
    </div>


    <div class="container" align="center">
        <table>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <b>
                    <h1 class="display-1" style="color:		#800080">Customer Registration</h1>
                </b>
                </br></br>

                <div class="container" align="center">
                    <tr>
                        <td><b> Title : </b></td>

                        <td><select name="title" id="" class="text-primary">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>First Name : </b></td>
                        <td></br><input type="text" name="fname" class="text-primary"></td>
                    </tr>

                    <tr>
                        <td> <b>Last Name : </b></td>
                        <td> </br><input type="text" name="lname" class="text-primary"></td>
                    </tr>

                    <tr>
                        <td> <b>Contact number :</b></td>
                        <td></br><input type="text" name="Contactnumber" class="text-primary"> </td>
                    </tr>
                    <tr>
                        <td> <b>District :</b></td>
                        <td></br><input type="text" name="District" class="text-primary"> </td>
                    </tr>
                    <tr>
                        <td></br><b><input type="reset" value="Reset" name="res" class="text-success"></b></td>
                        <td align="right"><b></br><input type="submit" value="Submit" name="Submit"
                                    class="text-danger"></b></td>
                    </tr>
                </div>

            </form>
        </table>
    </div>
</body>

</html>


<div class="container" align="center">
    <?php
    if (isset($_POST['Submit'])) {
        if (empty($_POST["fname"])) {
            echo '<span class="text-danger">First name is required</span>';
        } elseif (empty($_POST["lname"])) {
            echo '<span class="text-danger">Last name is required</span>';
        } elseif (empty($_POST["Contactnumber"])) {
            echo '<span class="text-danger">Contact number is required</span>';
        } elseif (empty($_POST["District"])) {
            echo '<span class="text-danger">District is required</span>';
        } else {
            $title = $_POST['title'];
            $first_name = $_POST['fname'];

            $last_name = $_POST['lname'];
            $contact_number = $_POST['Contactnumber'];
            $district = $_POST['District'];


            $conn = new mysqli('localhost', 'root', '', 'db');


            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO customer (title, first_name, last_name, contact_no, district) 
    VALUES ('$title', '$first_name', '$last_name', '$contact_number', '$district')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully ";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

            header("Location: Itemform.php");




        }
    }

    ?>
</div>