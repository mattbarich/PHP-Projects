<html>
    <meta charset="UTF-8">
    <title>HW3</title>
    <head>
        <style>
            table {
                background-color: burlywood;
                border: 1px solid crimson;
                width: 50%;
                text-align: center;
            }
            td {
                border: 5px solid crimson;
            }
            tr{
                border: 5px solid crimson;
            }
        </style>
    </head>
    <body>
        <h1>Welcome To my ski database</h1><br>
        <form action="HW03.php" , method="POST">
            <label>Enter Brand: </label><input type="text" name="brand" id="brand" required><br>
            <label>Enter Name: </label><input type="text" name="name" id="name" required><br>
            <label>Enter Price: </label><input type="number" placeholder="1.0" step=".01" min="0" name="price" id="price" required><br>
            <label>Model Year: </label><input type="number" name="year" id="year" required><br>
            <input type="submit" value="Submit Form">
        </form>
    </body>
</html>
<?php
    $dsn = 'mysql:host=localhost;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';

    try {
        if(isset($_POST['brand'])){
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $year = $_POST['year'];

        $db = new PDO($dsn, $username, $password);
        $insert = "INSERT INTO hw03
                    (brand,name,price,year) 
                VALUES 
                    (:brand,:name,:price,:year)
                    ";
        $statement = $db->prepare($insert);
        $statement->bindValue(':brand', $brand);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':year', $year);
        $statement->execute();

        $select = "SELECT * from hw03";
        $selectStatement = $db->prepare($select);
        $selectStatement -> execute();
        $readData = $selectStatement->fetchAll();

        echo "<table>";
        echo "<tr>"."<td>Id</td>"."<td>Brand</td>"."<td>Name</td>"."<td>Price</td>"."<td>Year</td>"."</tr>";
            foreach ($readData as $data){
                echo "<tr>"."<td>$data[id]</td>"."<td>$data[brand]</td>"."<td>$data[name]</td>"."<td>$data[price]</td>"."<td>$data[year]</td>";
            }
        echo "</table>";
        }

    }
    catch (PDOException $e){
        $msg = $e->getMessage();
        echo "<h1>ERROR: $msg</h1>";
    }

