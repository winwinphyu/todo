<?php
    require 'config.php';
    if($_POST)
    {
        $title = $_POST['title'];
        $desc = $_POST['descripion'];

        $sql = "INSERT INTO todo(title,description) VALUES(:title,:description)";
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute(
            array(
                ':title'=>$title,
                ':description'=>$desc
            )
        );
        if($result){
            echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
        }

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
           <h2>Create New ToDo</h2>
           <form action="add.php" class="" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="from-control" name="title" value="" required>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="descripion" class="form-control" rows="8" cols="80"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Submit">
                    <a href="index.php" type="button" class="btn btn-warning">Back</a>
                </div>
           </form>
        </div>
    </div>
    
</body>
</html>