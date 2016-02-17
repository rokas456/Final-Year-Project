<?php include("views/loginStyles/header.php"); ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <!-- Brand and toggle get grouped for better mobile display -->
   <?php include("views/loginStyles/top_nav.php") ?>
   <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
   <?php include("views/loginStyles/side_nav.php") ?>
   <!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-6">
            <h1 class="page-header">
               Users 
               <small>Register User</small>
            </h1>
            <ol class="breadcrumb">
               <h2>Add User</h2>

                  <div class="form-group">
                     <input type="text" class="form-control" id="username" placeholder="Username" >
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <input type="email" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <select size="5" class="form-control" id="roll">
                        <option>Data Analyst</option>
                        <option>Operator</option>
                        <option>Site Assesor</option>
                        <option>Admin</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <button type="submit" id="submitUser" class="btn btn-primary">Register</button>
                  </div>
                  <span id="useronfirmationOutput" style="margin-left:80px"></span>

            </ol>
         </div>

            <div class="col-lg-6">
             <h1 class="page-header">
               <small>Manage Users<span id="colorG" class="glyphicon glyphicon-user" style="float:right"></span> </small>
             </h1>
             <?php $db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS); 
                  $smt = $db->prepare('select* from users');
                   $smt->execute();?>
               <ol class="breadcrumb" id="ScrollStyle">

                  <!--Updating the user-->
                  <!--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#MyModal">Load User</button>-->

                  <div id="MyModal" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <div class="modal-title" id="updateUserTitle"></div>
                           </div>

                           <div class="modal-body">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="usernameUpdate" placeholder="Username" >
                                 </div>
                                 <div class="form-group">
                                    <input type="email" class="form-control" id="emailUpdate" placeholder="Email">
                                 </div>
                                 <div class="form-group">
                                    <select  class="form-control" id="rollUpdate" >
                                       <option>Data Analyst</option>
                                       <option>Operator</option>
                                       <option>Site Assesor</option>
                                       <option>Admin</option>
                                       </select>
                                </div>                                  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal" id="updateUser">Update</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Updating the user finished-->


                  <table class="table table-bordered">
                     <thead>
                      <tr>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Role</th>
                      </tr>
                     </thead>
                     <?php while($user = $smt->fetch(PDO::FETCH_OBJ)) { ?>
                     <tbody>
                     <tr>
                        <td><?php echo $user->username ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->role ?></td>
                        <td id="cursored"><a id="<?php echo $user->id?>" onclick="deleteUser(this.id)">Delete</a></td>
                        <td data-toggle="modal" data-target="#MyModal" id="cursored"><a id="<?php echo $user->id?>" onclick="editUserButton(this.id)">Edit</a></td>
                     </tr> 
                     <?php } ?>
                  </tbody>
                  </table>
               </ol>
           </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include("views/loginStyles/footer.php"); ?>
