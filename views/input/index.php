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
                           Input Process Info
                            <small>Choose Plant</small>
                        </h1>
                        <ol class="breadcrumb">
                            <h2 id="customFontStyle">Select Plant</h2>
                             <div id="realTimeMachinery"></div>
                                 <br /> 
                                <select size="10"  class="form-control" id="selectPlantProcess" onchange="checkPlant(this.value)">
                                </select>
                                <br />

                        </ol>
                    </div>

                    <div class="col-lg-6">
                        <h1 class="page-header">
                           <span class="glyphicon glyphicon-upload" style="float:right" id="colorG"></span>
                            <small>Choose Machinery</small>
                         </h1>
                        <ol class="breadcrumb">
                            <h2><span id="LoadMachinery">Load Machinery </span></h2>
                            <br />
                            <div id="realTime"></div>

                            <br />
                            <a href="http://localhost:8080/PharmaMachinery/input/showProcess"><button id="pButton" type="submit" class="btn btn-success" style="margin-left:600px; margin-top:20px"  disabled>View Processes</button></a>

                        </ol> 
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>