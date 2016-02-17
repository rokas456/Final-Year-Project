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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comment
                            <small><span id="colorG" class="glyphicon glyphicon-comment" style="float:right"></small>
                        </h1>
                        <ol class="breadcrumb">      
 
                             <div class="form-group">
                            <label for="pwd">Title</label>
                             <input type="text" class="form-control" id="pwd">
        
                             <label for="comment">Description</label>
                            <textarea class="form-control" rows="5" id="comment"></textarea>

                            <br />
                            <input type="hidden" name="date" value="<?php date_default_timezone_set('UTC'); echo date('Y-m-d'); ?>">
                            <button type="submit" class="btn btn-success">Upload</button>
<!--                             <a href="processFeed.php">View Process Feedback</a> -->
                           
                             <a href="<?php echo URL; ?>Comment/ViewComments"><button type="submit" class="btn btn-default">View Process Feedback</button></a>
                              <a href="<?php echo URL; ?>Comment/ViewComments"><button type="submit" class="btn btn-default">View Comments</button></a>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>