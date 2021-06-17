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
        body{
            background: fuchsia;
        }
    </style>
</head>
<body>
    <div class="nav-bar">
        <a href="read.php">READ</a>
        <a href="insert.php">CREATE</a>
    </div>

    <h1>Insert into database</h1>
    <form action="insert.php" , method="POST">
        <label>Enter Brand: </label><input type="text" name="brand" id="brand" required><br>
        <label>Enter Model: </label><input type="text" name="model" id="model" required><br>
        <label>Enter Type: </label><input type="text"  name="type" id="type" required><br>
        <label>Model Price: </label><input type="number"  placeholder="1.0" step=".01" min="0" name="price" id="price" required><br>
        <input type="submit" value="Submit Form">
    </form>
</body>
</html>
<?php
    $dsn = 'mysql:host=localhost;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';

    try{
        if(isset($_POST['brand'])){
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $type = $_POST['type'];
            $price = $_POST['price'];

            $db = new PDO($dsn, $username, $password);
            $insert = "INSERT INTO barich_hw13
                            (brand,model,type,price)
                        VALUES 
                            (:brand,:model,:type,:price)
                        ";
            $statement = $db->prepare($insert);
            $statement->bindValue(':brand', $brand);
            $statement->bindValue(':model', $model);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':price', $price);
            $statement->execute();
            header('Location: read.php');
        }
    }
    catch (PDOException $e){
        $msg = $e->getMessage();
        echo "<h1>ERROR: $msg</h1>";
    }
