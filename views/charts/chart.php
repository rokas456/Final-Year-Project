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
                    <div class="col-lg-7">
                        <h1 class="page-header">
                            Charts
                            <small>Graph for</small>
                        </h1>
                        <ol class="breadcrumb">      
                             <div id="AjaxTryLoad"></div>
                             <div id="container" style="min-width: 410px; max-width: 800px; height: 500px; margin: 0 auto"></div><br />
                             
                        </ol>
                    </div>
                    <div class="col-lg-5">
                        <h1 class="page-header">
                           
                            <small>Pie for: <span id="colorG" class="glyphicon glyphicon-comment" style="float:right"></small>
                        </h1>
                    	 <ol class="breadcrumb">  
                    	<div id="containerPie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>