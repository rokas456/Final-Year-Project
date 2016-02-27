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
                    <div class="col-lg-4">

                        <h1 class="page-header">
                            Create Plant 
                            <small>Add Subparts</small>
                        </h1>
                        <ol class="breadcrumb" >
                             <!--
                         <a href="<?php echo URL; ?>CreatePlant/createProcess"><button type="submit" class="btn btn-success" >Finalise Plant Process</button></a> -->
                         <button type="submit" class="btn btn-success" id="formSubmitSubparts">View Machinery</button>
                          
                         <div id="responseMachinery"></div>

                        </ol>
                    </div>

                    <!--Add process-->
                     <div class="col-lg-4">
                        <h1 class="page-header">
                            <small id="responseMachineryName">Subparts Input </small>
                        </h1>
                        <ol class="breadcrumb" >
                            <div id="responseProcess" style="padding:5px; height:600px; width:460px; border:2px solid green;"></div>
                        </ol>
                    </div>

                     <div class="col-lg-4">
                        <h1 class="page-header">
                            <span id="colorG" class="glyphicon glyphicon-plus" style="float:right"></span>
                            <small>System Output <span id="gamediv"></span> </small>
                        </h1>
                        <ol class="breadcrumb" >
                            <div id="responseProcesssOutput" style=" padding:5px; height:600px; width:460px; border:2px solid red;"></div>
                            <a href="<?php echo URL; ?>CreatePlant/createSubparts"><button type="submit" class="btn btn-info"  id="finishCreatePlantBTN" style="visibility:hidden;">Proceed</button></a>
                        </ol>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>