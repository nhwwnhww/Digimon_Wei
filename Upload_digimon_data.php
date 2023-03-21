<?php
//Create Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "digimon";
$conn = mysqli_connect($servername, $username, $password, $database);

//Test Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Checks data has been sent
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['fileData'])) {
    addData($conn);
}
//function to do the adding
function addData($conn)
{
    $data = explode("|", $_POST['fileData']); //breaks apart the data into rows
    foreach ($data as $row) {
        $row1 = explode(',', $row);
        $email = trim($row1[1]);
        $fname = trim($row1[2]);
        $lname = trim($row1[3]);
        $password = trim($row1[4]);

        //Create and run the sql for each row to insert
        $stmt = $conn->prepare("INSERT INTO `digimon`(Name, Type, HP, Attack) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $fname, $lname, $password);
        $stmt->execute();
    }
}

//Close connection
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Select a CSV file:</h1>
    <input id="fileinput" type="file">
    <form action="Upload_digimon_data.php" method='post'>
        <input type='hidden' id='fileData' name='fileData'></input>
        <input type='submit' value='Upload Data' name='Upload Data'></input>
    </form>

    <div id="output"></div>
    <script>
        // read csv
        function readSingleFile(evt) {
            var f = evt.target.files[0];

            if (f) {
                var r = new FileReader();
                r.onload = function(e) {
                    var contents = e.target.result;
                    contents = contents.replaceAll('\n', '|');
                    document.getElementById('fileData').value = contents;
                    alert(document.getElementById('fileData').value);
                }
                r.readAsText(f);
            } else {
                alert('File upload failed :(');
            }
        }
        document.getElementById('fileinput').addEventListener('change', readSingleFile, false);
    </script>
    <script>
        // display raw data
        function read(contents) {
            document.getElementById("output").innerHTML = contents;
        }
        // display as table
        function table(rows) {
            var html = "<table border='1|1'>";
            for (var i = 0; i < rows.length; i++) {
                html += "<tr>";
                html += "<td>" + rows[i][0] + "</td>";
                html += "<td>" + rows[i][1] + "</td>";
                html += "<td>" + rows[i][2] + "</td>";
                html += "<td>" + rows[i][3] + "</td>";
                html += "<td>" + rows[i][4] + "</td>";

                html += "</tr>";

            }
            html += "</table>";
            document.getElementById("output").innerHTML = html;
        }
    </script>


</body>

</html>