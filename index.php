<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .div_form{
            width:20%;
            margin-left:30%;
            margin-top:2%;
        }
    </style>
</head>
<body class="container">
<?php require_once 'process.php';?>
    <?php 
    if(isset($_SESSION['message'])):?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php echo $_SESSION['message']; 
unset($_SESSION['message']);
?>
</div>
<?php endif; ?>

    
    <?php 
    $mysqli= new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
     $res=$mysqli->query("SELECT * FROM data") or die($mysqli->error);
        ?>
        <div class="row justify-content-center" style="width:100%;">
<table class="table">
        <thead>
        <tr><th>ID</th>
            <th>name</th>
    <th>
    location
    </th>
    <th colspan="2">
        action
    </th>
    </tr>
    </thead>
    <?php 
        while($row = $res->fetch_assoc()): ?>
        <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td>
        <a href="index.php?edit=<?php echo $row['ID'];?>" class="btn btn-info">edit</a>
        <a href="process.php?delete=<?php echo $row['ID'];?>" class="btn btn-danger">Delete</a>    
    </td>
        <?php endwhile; ?>
        </tr>

    </table>
</div>
    
        <?php
function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo'</pre>';
}
    ?>

    <div class="row justify-content-center div_form">
    <form action="process.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="name" placeholder="enter your name">
        </div>
        <br>
        <div class="form-group">
            <label for="location">location</label>
            <input type="text"  class="form-control" value="<?php echo $location; ?>"  name="location" id="location" placeholder="enter your location">
        </div>
        <br>
        <div class="form-group">
            <?php if($update == true) : ?>
                <button type="submit" class="btn btn-info" name="update">update</button>
            <?php else :  ?>
                <button type="submit" class="btn btn-primary" name="save">save</button>
            <?php endif; ?>
            </div>
    </form>
</div>
</body>
</html>