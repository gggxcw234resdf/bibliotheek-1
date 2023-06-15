<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $last_name = $address = $number = $email = $role = "";
$name_err = $last_name_err = $address_err = $number_err = $email_err = $role_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    // Validate last name
    $input_last_name = trim($_POST["last_name"]);
    if(empty($input_last_name)){
        $last_name_err = "Please enter a last name.";
    } elseif(!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $last_name_err = "Please enter a valid last name.";
    } else{
        $last_name = $input_last_name;
    }
    
    // Validate address 
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate number
    $input_number = trim($_POST["number"]);
    if(empty($input_number)){
        $number_err = "Please enter your number.";     
    } elseif(!ctype_digit($input_number)){
        $number_err = "Please enter a correct number.";
    } else{
        $number = $input_number;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }

    // Validate role
    $input_role = trim($_POST["role"]);
    if(empty($input_role)){
        $role_err = "Please select an role.";     
    } else{
        $role = $input_role;
    }

    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

    // Check input errors before inserting in database
    if(empty($name_err) && empty($last_name_err) && empty($address_err) && empty($number_err) && empty($email_err) && empty($role_err)){
        // Prepare an update statement
        $sql = "UPDATE accounts SET first_name=?, last_name=?, address=?, phone_number=?, email=?, role=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_name, $param_last_name, $param_address, $param_number, $param_email, $param_role, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_last_name = $last_name;
            $param_address = $address;
            $param_number = $number;
            $param_email = $email;
            $param_role = $role;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM accounts WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["first_name"];
                    $last_name =  $row["last_name"];
                    $address = $row["address"];
                    $number = $row["phone_number"];
                    $email = $row["email"];
                    $role = $row["role"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>first name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <textarea name="last name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"><?php echo $last_name; ?></textarea>
                            <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Number</label>
                            <textarea name="number" class="form-control <?php echo (!empty($number_err)) ? 'is-invalid' : ''; ?>"><?php echo $number; ?></textarea>
                            <span class="invalid-feedback"><?php echo $number_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <form method="POST">
                            <select name="role" id="hoi">
                                <option value="Lezer">Lezer</option>
                                <option value="Medewerker">Medewerker</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </form>

                        <?php
                        if (isset($_POST['role'])) {
                            $role = $_POST['role'];
                            $query = "INSERT INTO accounts (role) VALUES ('$role')";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                echo 'Data inserted successfully.';
                            } else {
                                echo 'Error inserting data: ' . mysqli_error($con);
                            }
                        }
                        ?>
                            <span class="invalid-feedback"><?php echo $role_err;?></span>
                    
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>