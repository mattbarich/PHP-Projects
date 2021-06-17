<html>
    <title>HW13</title>
    <head>
        <style>
            .nav-bar {
                overflow: hidden;
                background-color: #333;
                font-family: Arial, Helvetica, sans-serif;
            }
            .nav-bar a{
                float: left;
                font-size: 16px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            .table{
                border: 1px solid navy;
                width: 50%;
                text-align: center;
                padding: 15px;
                text-decoration: none;
                font-family: Arial;
            }
            body{
                background: lightgreen;
            }
        </style>
    </head>
    <div class="nav-bar">
        <a href="read.php">READ</a>
        <a href="insert.php">CREATE</a>
    </div>
</html>



<?php
    $dsn = 'mysql:host=localhost;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';
    try{
        $db = new PDO($dsn, $username, $password);

        $select = "SELECT * FROM barich_hw13";
        $selectStatement = $db->prepare($select);
        $selectStatement->execute();
        $readData = $selectStatement->fetchAll();

        echo "<Table class='table'>";
        echo "<tr>"."<td>Brand</td>"."<td>Model</td>"."<td>Type</td>"."<td>Price</td>"."</tr>";
        foreach ($readData as $data){
            echo "<tr>"."<td>$data[brand]</td>"."<td>$data[model]</td>"."<td>$data[type]</td>"."<td>$data[price]</td>"."<td><a href='update.php?brand={$data['brand']}&model={$data['model']}&type={$data['type']}&price={$data['price']}&id={$data['id']}'>Update</a></td>".
                "<td><a href='delete.php?id={$data['id']}'>Delete</a></td>"."</tr>";
        }
        echo "</table>";
    }catch (PDOException $e){
        $msg = $e->getMessage();
        echo "<h1>ERROR: $msg</h1>";
    }


