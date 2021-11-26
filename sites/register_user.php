<?php
require $_SERVER["DOCUMENT_ROOT"]."/controller/sConstrMain.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/navigation.php";
include $_SERVER["DOCUMENT_ROOT"]."/imports/copyright.php";
$s = new sConstrMain("newUser", "New User");


// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php print($s->getStyleFolder()) ?>stylesheet.css">
    <title><?php print($s->getSiteTitle()); ?></title>
</head>
<body class="<?php print ($s->getBodyClass()); ?>">
<div class="container">
    <header class="header">
        <?php
        print($s->getHeader());
        ?>
    </header>
    <div class="siteContent">
        <nav class="nav">
            <?php
            print($s->getNavigation());
            ?>
        </nav>
        <div class="mainContent">
            <div class="content">
                <article class="article">
                    <form action="register_user.php">
                        <table>
                            <tbody>
                            <tr>
                                <td><label for="fname">First Name:</label></td>
                                <td><input type="text" id="fname" name="fname"></td>
                            </tr>
                            <tr>
                                <td><label for="lname">Last Name:</label></td>
                                <td><input type="text" id="lname" name="lname"></td>
                            </tr>
                            <tr>
                                <td><label for="pword">Password:</label></td>
                                <td><input type="password" id="pword" name="pword"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Submit"></td>
                                <td><input type="reset" value="Reset"></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </article>
            </div>
        </div>
    </div>
    <footer class="footer">
        <?php print(copyright()); ?>
    </footer>
</div>
</body>
</html>
<?php

?>