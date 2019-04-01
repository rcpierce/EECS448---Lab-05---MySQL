<!DOCTYPE html>
<html>
<head>
    <title>Deletion Successful</title>
</head>
<body>
    <?php

        $myDB = new mysqli("mysql.eecs.ku.edu", "rcp07", "Fu4caayo", "rcp07");

        if ($myDB->connect_errno) {
            printf("Connect failed: %s\n", $myDB->connect_error);
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $checked = $_POST["checkbox[]"];
        }

        for($i=0; $i < count($checked); $i++) {
            $delete_id = $checked[$i];
            $delete_query = $myDB->query("DELETE FROM Posts WHERE post_id='$delete_id'");
            echo "Post number " . $delete_id . " deleted!";
        }
        

    ?>
    <form>
        <button type='submit' formaction='AdminHome.html'>Return to Admin Home</button>
    </form>
</body>
</html>