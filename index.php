<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = mysqli_connect("localhost","u623952480_root","Dare1took!","u623952480_data");

if (!$conn) {
    die("Connect Failed". mysqli_connect_error());
}

$sql = "SELECT users.username, users.email, orders.product_name,orders.order_date
FROM users
JOIN orders ON users.user_id = orders.user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
    echo"<h2> Orders</h2>";
    echo"<table border='1'>";
    echo"<tr><th>Username</th><th>Email</th><th>Product</th><th>Order Date</th></tr>";


    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["username"] ."</td>";
        echo "<td>" . $row["email"] ."</td>";
        echo "<td>" . $row["product_name"] ."</td>";
        echo "<td>" . $row["order_date"] ."</td>";
        echo "</tr>";
}   
    echo "</table>";
}
else {  
    echo "No orders to show";
}

mysqli_close($conn);    

?>