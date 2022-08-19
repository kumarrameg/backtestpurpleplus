<?php
if (isset($_POST["submit-btn"]))
{

    $oneDArray = array_filter(explode('!', $_POST["signalresults"]));
    $twoDArray = [];

    foreach ($oneDArray as $singlePairResult)
    {
        array_push($twoDArray, array_filter(explode(' ', $singlePairResult)));
    }

    $currentDate = $_POST["currentdate"];

    $currentday = date('D', strtotime("$currentDate"));

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "backtestpairs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT id FROM parisdetail";
    $result = mysqli_query($conn, $query);

    if (empty($result))
    {
        $query = "CREATE TABLE `parisdetail` (
                            `id` int(112) AUTO_INCREMENT PRIMARY KEY,
                            `currentdate` varchar(122) NOT NULL,
                            `currentday` text NOT NULL,
                            `hour` varchar(122) NOT NULL,
                            `pair` text NOT NULL,
                            `direction` text NOT NULL,
                            `result` text NOT NULL
                          ) ;";
        $result = mysqli_query($conn, $query);
    }

    foreach ($twoDArray as $singleresult)
    {
        if ($singleresult[3] == '⛔️')
        {
            $acutleResult = 'loss';
        }
        else
        {
            $acutleResult = 'win';
        }

        $sql = "INSERT INTO parisdetail (currentdate,currentday, hour, pair,direction, result)
VALUES ('$currentDate','$currentday', '$singleresult[0]', '$singleresult[1]', '$singleresult[2]', '$acutleResult')";

        $conn->query($sql);
    }

    $conn->close();
    header("Location: dashboard.php");
    die();
}

