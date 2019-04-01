<!DOCTYPE html>
<html>
<head>
    <title>View User Posts</title>
</head>
<body>
    <?php

        $myDB = new mysqli("mysql.eecs.ku.edu", "rcp07", "Fu4caayo", "rcp07");

        if ($myDB->connect_errno) {
            printf("Connect failed: %s\n", $myDB->connect_error);
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
        }

        $user_query = ($myDB->query("SELECT user_id FROM Users WHERE user_id='$username'"));
        $user_result = mysqli_fetch_array($user_query);
        $user_id = $user_result["user_id"];

        $message_query = ($myDB->query("SELECT post_id, content FROM Posts WHERE author_id='$user_id'"));

        if ($message_query) {
            echo "<h1>" . $username . "'s Post History</h1>";
            echo "<table>";
            echo "<tr><th><strong>Post ID</strong></th><th><strong>Posted Message</strong></th></tr>";

            while ($tr = $message_query->fetch_assoc()) {
                $post_id = $tr["post_id"];
                $content = $tr["content"];
                echo "<tr><td>" . $post_id . "</td><td>" . $content . "</td></tr>";
            }

            echo "</table>";
            $message_query->free();   
        }
     
        echo "<br>";
        echo "<form>
                <button type='submit' formaction='AdminHome.html'>Return to Admin Home</button>
              </form>";
    ?>
</body>
</html>