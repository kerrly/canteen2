<?php
$con = mysqli_connect("localhost", "kerrly", 'tallrabbit61', "kerrly_canteen");
if(mysqli_connect_errno()){
    echo"failed to connect to MySQL:".mysqli_connect_error(); die();}
else {
    echo "connected to database";
    }

$all_item_query = "SELECT itemID, item FROM item";
$all_item_result = mysqli_query($con, $all_item_query);
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
            <h1> Canteen </h1>
            <nav>
                <ul>
                    <li> <a href='index.php'> HOME </a></li>
                    <li> <a href='item.php'> FOOD </a></li>
                    <li> <a href='orders.php'> ORDERS </a></li>
<!--                    <li> <a href='customers.php'> CUSTOMER</a></li>-->
<!--                    <li><a href='login.php'> ADMIN</a></li>-->
<!--                    <li><a href='process_logout.php'> Logout</a></li>-->

                </ul>
            </nav>
        </header>


<main>
    <form name='item_form' id='item_form' method='get' action='item.php'>
        <select id='item' name='item'>
            <?php
            while($all_item_record = mysqli_fetch_assoc($all_item_result)){
                echo "<option value = '".$all_item_record['itemID']."'>";
                echo $all_item_record['item'];
                echo"</option>";
            }
            ?>
        </select>

        <input type='submit' name='item_button' value='show me the food info'>
    </form>

    <form name='orders_form' id='orders_form' method='get' action='orders.php'>
            <select id='order' name='order'>
                <?php
                    while($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                        echo "<option value = '".$all_orders_record['orderID']."'>";
                        echo $all_orders_record['orderID'];
                    }
                ?>
            </select>

            <input type='submit' name='orders_button' value='show me the order info'>
        </form>
</main>



</html>

