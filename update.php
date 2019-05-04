<!DOCTYPE html>
<?php include 'db.php';
$id=$_GET['id'];
$sql="select * from task where id ='$id'";
$rows=$db->query($sql);
$row=$rows->fetch_assoc();

if (isset($_POST['send'])) {

  $task=$_POST['task'];
  $sql="update  task set name='$task' where id ='$id' ";
  $db->query($sql);
  header('location:index.php');
}





 ?>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Crud App</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
         integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <center>
               <h1>Todo List</h1>
            </center>
            <div class="col-md-10 col-md-offset-1">


                  <hr>
                  <br>
                  <!-- Modal -->


                             <form method="post" >
                            <div class="form-group" >
                              <label>Task Name:</label>
                              <input type="text" value="<?php echo $row['name']; ?>" required name="task" class="form-control">

                            </div>
                            <input type="submit" name="send" value="Update" class="btn btn-success">
                            <a href="index.php" class="btn btn-warning">Back</a>
                            </from>



            </div>
         </div>
      </div>
   </body>
</html>
