<?php
$con = mysqli_connect("localhost", "kerrly", 'tallrabbit61', "kerrly_canteen");
if(mysqli_connect_errno()){
    echo"failed to connect to MySQL:".mysqli_connect_error(); die();}
else {
    echo "connected to database";
}

if(isset($_GET['order'])){
    $id = $_GET['order'];
}else{
    $id = 1;
}

$this_order_query = "SELECT orders.orderID, customer.Fname, customer.Lname, item.item
FROM customers, orders, item
WHERE customers.customerID = orders.customerID
AND orders.itemID = item.itemID AND orders.itemID ='". $id ."'";
$this_order_result = mysqli_query($con, $this_order_query);
$this_order_record = mysqli_fetch_assoc($this_order_result);
$all_orders_query = "SELECT orderID FROM orders ORDER BY orderID ASC ";
$all_orders_result = mysqli_query($con, $all_orders_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> canteen </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<header>
    <h1> canteen </h1>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME </a></li>
            <li> <a href='item.php'> FOOD </a></li>
            <li> <a href='orders.php'> ORDERS </a></li>
<!--            <li> <a href='customers.php'> CUSTOMER</a></li>-->
<!--            <li><a href='login.php'> ADMIN</a></li>-->
        </ul>
    </nav>
</header>
<main>
    <?php
    echo "<p> Order Number: " .$this_order_record['orderID'] . "<br>";
    echo "<p> Customer First Name: " .$this_order_record['Fname'] ."<br>";
    echo "<p> Customer Last Name: ". $this_order_record['Lname'] . "<br>";
    echo "<p> Food : ". $this_order_record['item'] . "<br>";
    ?>
<h2> select another order </h2>
    <form name='orders_form' id='orders_form' method='get' action='orders.php'>
        <select id='order' name='order'>
            <?php
            while($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                echo "<option value = '".$all_orders_record['orderID']."'>";
                echo $all_orders_record['orderID'];
            }
            ?>
        </select>

        <input type='submit' name'orders_button' value='show me the order info'>
    </form>
</main>



</body>



</html>