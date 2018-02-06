
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width, initial-scale-1">
    <link href="examCss.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
</head>
</html>

<body id="Mainpage">

</body>

<?php



$link = mysqli_connect('localhost', 'root', 'root', 'smartmobileservice');
mysqli_set_charset($link,'utf8');


// If Connection Failed, Close
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

?>
<html>
<h1>
    Hello and welcome!

</h1>

<li id="navbar"><a href="smartlager.php">Smartlager med HTTP Request GET</a></li>

</html>

<?php
    $sql = "SELECT vareNum, navn, beskrivelse, slagspris, Lagerstatus FROM reservedele";
    $result = $link->query($sql);
 if ($result->num_rows > 0) {

 }
echo "<table><tr><th> Varenummer</th><th>Navn</th><th>Beskrivelse</th><th>Salgspris</th><th>Lagerstatus</th></tr>";
echo " <br><h4>Her er en Liste over relevant information omkring reservedele</h4><br>";
while($row = $result->fetch_assoc()) {

    echo "<tr><td>".$row["vareNum"]."</td><td>". $row["navn"]."</td><td> ". $row["beskrivelse"]."</td><td>". $row["slagspris"] . "</td><td>".$row["Lagerstatus"]." </td></tr>";

}

