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
                            <span id="colorG" class="glyphicon glyphicon-print" style="float:right"></span>
                            Download Data
                            <small>Download File for </small>
                        </h1>
                        <ol class="breadcrumb">

                            <h2>Click download to download the file</h2>
                            <a href="<?php echo URL; ?>download"><button type="button" class="btn btn-default">Back</button></a>
                            <a href="<?php echo URL; ?>download/downloadData"><button type="button" class="btn btn-success">Download</button></a>

                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>