<!DOCTYPE html>
<?php include 'db.php';
if (isset($_GET['page'])) {
$page=$_GET['page'];

}
else {
    $page=1;
}
$num_per_page=05;
$start_from=($page-1)*05;



$sql="select * from task limit $start_from,$num_per_page";
$result=$db->query($sql);

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
               <table class="table table-striped table-hover">
                  <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-success" name="button">Add task</button>
                  <button type="button" class="btn btn-defutl pull-right" name="button" onclick="print()">Print</button>
                  <hr>
                  <br>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title text-center" id="exampleModalLabel">Add Task</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                             <form method="post" action="add.php">
                            <div class="form-group" >
                              <label>Task Name:</label>
                              <input type="text" required name="task" class="form-control">

                            </div>
                            <input type="submit" name="send" value="Add Task" class="btn btn-success">
                            </from>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>

                  <thead>
                     <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Task</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                       <?php
                        while ($row=$result->fetch_assoc()):?>

                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td class="col-md-10"><?php echo $row['name'] ?></td>
                        <td> <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                     </tr>
                       <?php endwhile; ?>
                  </tbody>
               </table>
               <center>

                  <?php
                    $pr_query="select * from task";
                    $pr_result=$db->query($pr_query);
                    $total_record=mysqli_num_rows($pr_result);
                    $total_page=ceil($total_record/$num_per_page);

                    if ($page>1) {

                    echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";

                    }
                    for ($i=1; $i <$total_page ; $i++) {
                      echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";
                    }
                    if ($i>$page) {

                    echo "<a href='index.php?page=".($page+1)."' class='btn btn-success'>Next</a>";

                    }


                   ?>
               </center>
            </div>
         </div>
      </div>
   </body>
</html>
