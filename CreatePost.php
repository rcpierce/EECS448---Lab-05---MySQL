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
        $message = $_POST["message"];
    }

    $user_query = ($myDB->query("SELECT user_id FROM Users WHERE user_ID='$username'"));
    $user_returned = mysqli_fetch_array($user_query);

    $user_id = $user_returned["user_id"];

    if ($user_id == "") {
        echo "<strong>Username does not exist. Please enter a valid username.</strong>";
    } else if ($message == "") {
        echo "<strong>Post not submitted. Input cannot be empty.</strong>";
    } else {
        $message_query = "INSERT INTO Posts (author_id, content) VALUES ('$user_id', '$message')";
        if ($myDB->query($message_query) == TRUE) {
            echo "<h2>Message sent!</h2>";
            echo "<strong>Username: </strong>" . $username . "<br>";
            echo "<strong>Message: </strong><br>" . $message . "<br>";
        }
    }

    echo "<br>";
    echo "<form>
            <button type='submit' formaction='CreatePost.html'>Return to Message Page</button>
          </form>";
    echo "<form>
            <button type='submit' formaction='AdminHome.html'>Return to Admin Home</button>
          </form>";

    ?>
</body>
</html>