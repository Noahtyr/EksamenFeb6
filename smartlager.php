
<?php
/**
 * Created by PhpStorm.
 * User: Noahd
 * Date: 06-02-2018
 * Time: 13:41
 */


// REST = Representational State Transfer
// Er dit JSON Api Restful?  JSON APi er restful, da man har mulighed for at kunne bruge Get, Post, put og delete og kunne bruge dem i HTTP
// Vi får derfor JSON objekter fra vores API. På vores JSON API på Mamp, har vi mulighed for at selecte alt information
// Om en specifik Vare med udgangspunkt i deres Varenummer. Dette information bliver vist i JSON objekter og bliver skrevet I HTTP



 // echo "Velkommen til Smartlager! her kan du se vores Lager I JSON" . "<br>";
//This is our instance Variable
$method = $_SERVER['REQUEST_METHOD'];
$array = [];
parse_str ($_SERVER['QUERY_STRING'], $array);
// connect to the mysql database
$link = mysqli_connect('localhost', 'root', 'root', 'smartmobileservice');
mysqli_set_charset($link,'utf8');


// This If statement will give us information regarding Tours, If ID is requested in the URL
// I will be shown in JSON format, since its JSON encoded.
if ($method == 'GET' && array_key_exists('vareNum',$array)) {
    $sql = "Select * FROM reservedele WHERE vareNum =".$array['vareNum'];
    $result = mysqli_query($link,$sql);
    if (!$result){
        http_response_code(404);
        die(mysqli_error());
    }
    echo json_encode($result->fetch_assoc());
} else{
   // echo "Ingen Data fundet, brug HTTP til at lave requests";
}


// close mysql connection
mysqli_close($link);
exit;