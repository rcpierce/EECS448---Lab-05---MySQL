<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <?php

        $myDB = new mysqli("mysql.eecs.ku.edu", "rcp07", "Fu4caayo", "rcp07");

        if ($myDB->connect_errno) {
            printf("Connect failed: %s\n", $myDB->connect_error);
            exit();
        }

        $user_query = ($myDB->query("SELECT * FROM Users"));

        if ($user_query) {
            echo "<h1>Registered Users</h1>";
            echo "<table>";

            while ($tr = $user_query->fetch_assoc()) {
                $username = $tr["user_id"];
                echo "<tr><td>" . $username . "</td></tr>";
            }

            echo "</table>";    
        }
     
        echo "<br>";
        echo "<form>
                <button type='submit' formaction='AdminHome.html'>Return to Admin Home</button>
              </form>";
    ?>
</body>
</html>