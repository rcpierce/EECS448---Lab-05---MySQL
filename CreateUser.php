<!DOCTYPE html>
<html>
<head>
    <title>Message Board</title>
</head>
<body>
    <?php

    $myDB = new mysqli("mysql.eecs.ku.edu", "rcp07", "Fu4caayo", "rcp07");

    if ($myDB->connect_errno) {
        printf("Connect failed: %s\n", $myDB->connect_error);
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
    }

    $user_query = ("INSERT INTO Users (user_id) VALUES ('$username')");

    if ($myDB->query($user_query) == TRUE) {
        echo "<strong>Success!  Your new username is: " . $username . "</strong>";
    } else {
        echo "<strong>Either the username already exists or the field is empty.  Please enter a new username.</strong>";
    }

    echo "<br>";
    echo "<form>
            <button type='submit' formaction='CreateUser.html'>Return to Username Form</button>
          </form>";
    echo "<form>
            <button type='submit' formaction='AdminHome.html'>Return to Admin Home</button>
          </form>";

    ?>
</body>
</html>



