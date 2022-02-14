<?php
    require 'config.php';
    
    if($_POST){
        // echo 'post action';
        $title = $_POST['title'];
        $desc = $_POST['descripion'];
        $id = $_POST['id'];

        $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
        $result = $pdostatement->execute();

        if($result){
            echo "<script>alert('New ToDo is updated');window.location.href='index.php';</script>";
        }

    }else{
        $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();

    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
           <h2>Edit New ToDo</h2>
           <form action="" class="" method="post">
               <input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="from-control" name="title" value="<?php echo $result[0]['title']?>" required>
                </div>
                <div>
                    <label for="">Description</label>
                    <textarea name="descripion" class="form-control" rows="8" cols="80"><?php echo $result[0]['description']?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Update">
                    <a href="index.php" type="button" class="btn btn-warning">Back</a>
                </div>
           </form>
        </div>
    </div>
    
</body>
</html>