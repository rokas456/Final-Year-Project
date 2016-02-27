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
                           View Processes
                            <small>Choose Plant</small>
                        </h1>
                        <ol class="breadcrumb">
                            <h2>Select Plant</h2>
                             <div id="realTimeMachinery"></div>
                                 <br /> 
                                <select size="10"  class="form-control" id="selectPlantProcess" onchange="checkPlant(this.value)">
                                </select>
                                <br />

                        </ol>
                    </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>