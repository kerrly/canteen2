<?php
$con = mysqli_connect("localhost", "kerrly", 'tallrabbit61', "kerrly_canteen");
if (mysqli_connect_errno()) {
    echo "failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}
if(isset($_GET['item'])){
    $id = $_GET['item'];
}else{
    $id = 1;
}
$this_item_query = "SELECT item, cost FROM item WHERE itemID ='" . $id  . "'";
$this_item_result= mysqli_query($con, $this_item_query);
$this_item_record= mysqli_fetch_assoc($this_item_result);

$all_item_query = "SELECT itemID, item FROM item";
$all_item_result = mysqli_query($con, $all_item_query);


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
            <li><a href='index.php'> HOME </a></li>
            <li><a href='item.php'> FOOD </a></li>
            <li><a href='orders.php'> ORDERS </a></li>
<!--            <li> <a href='customers.php'> CUSTOMER</a></li>-->
<!--            <li><a href='login.php'> ADMIN</a></li>-->
<!--            <li><a href='update_drinks.php'> UPDATE DRINKS </a></li>-->
        </ul>
    </nav>
</header>
<main>
    <h2> Food Information </h2>
    <?php

        echo "<p> Item Name: ".$this_item_record['item']."<br>";
        echo"<p> Cost:". $this_item_record['cost']."<br>";
    ?>
<!--    <h2> select another item </h2>-->
<!--    <form name='item_form' id='item_form' method='get' action='item.php'>-->
<!--        <select id='item' name='item'>-->
<!--            --><?php
//            while($all_item_record = mysqli_fetch_assoc($all_item_result)){
//                echo "<option value = '".$all_item_record['itemID']."'>";
//                echo $all_item_record['item'];
//                echo"</option>";
//            }
//            ?>
<!--        </select>-->
<!---->
<!--        <input type='submit' name'item_button' value='show me the food info'>-->
<!--    </form>-->
<!---->
<!--<h2> search for an item </h2>-->
<!--    <form action="" method="post">-->
<!--        <input type="text" name='search'>-->
<!--        <input type="submit" name="submit" value="Search">-->
<!--    </form>-->
<!--    --><?php
//    if(isset($_POST['search'])) {
//        $search = $_POST['search'];
//        $query1 = "SELECT * FROM item WHERE item LIKE '%$search%'";
//        $query = mysqli_query($con, $query1);
//        $count = mysqli_num_rows($query);
//
//        if($count ==0){
//            echo "There was no search results!";
//        }
//        else{
//            while($row = mysqli_fetch_array($query)) {
//                echo $row ['item'];
//                echo "<br>";
//            }
//        }
//    }
//    ?>

</main>
</body>


</html>