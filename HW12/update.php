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
        form{
            padding: 15px;
            color: navy;
        }
        body{
            background: red;
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
    $db = new PDO($dsn, $username, $password);

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'GET'){
        $id = $_GET['id'];
        $select = "SELECT * FROM barich_hw13 WHERE id=".$id;
        $statement = $db->prepare($select);
        $statement->execute();

        $data = $statement->fetchAll();
    ?>
    <form method="POST">
        Enter Brand:<input type="text" name="brand" id="brand" value="<?php echo $data[0]['brand'];?>"><br>
        Enter Model: <input type="text" name="model" id="model" value="<?php echo $data[0]['model'];?>"><br>
        Enter Type: <input type="text"  name="type" id="type" value="<?php echo $data[0]['type'];?>"><br>
        Model Price: <input type="number" step=".01" min="0" name="price" id="price" value="<?php echo $data[0]['price'];?>"><br>
        <input type="submit" value="Update Form">
        <input type="hidden" value="<?php echo $id;?>" name="id">
    </form>
<?php
        $statement->closeCursor();
    }else{
            $id = $_POST['id'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $type = $_POST['type'];
            $price = $_POST['price'];

            $update = 'UPDATE barich_hw13 SET brand=:brand, model=:model, type=:type, price=:price WHERE id='.$id.';';
            $statement = $db->prepare($update);
            $statement->bindValue(':brand',$brand);
            $statement->bindValue(':model',$model);
            $statement->bindValue(':type',$type);
            $statement->bindValue(':price',$price);
            $statement->execute();
            header("Location: read.php");
    }

