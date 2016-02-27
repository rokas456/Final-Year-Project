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
                            Charts
                            <small>Select Plant<span id="colorG" class="glyphicon glyphicon-comment" style="float:right"></small>
                        </h1>
                        <ol class="breadcrumb">      
                             <div id="realTimeMachinery"></div>
                                 <br /> 
                                <select size="10"  class="form-control" id="selectPlantProcess" onchange="checkPlant(this.value)">
                                </select>
                                <br />
                               <a href="<?php echo URL; ?>charts/chartss"><button type="submit" class="btn btn-primary" style="float:right" id="testGraph">Show Graph</button></a>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>