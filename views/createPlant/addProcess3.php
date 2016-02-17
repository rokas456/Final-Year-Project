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
                            <small>Add Processes</small>
                        </h1>
                        <ol class="breadcrumb" >
                             <!--
                         <a href="<?php echo URL; ?>CreatePlant/createProcess"><button type="submit" class="btn btn-success" >Finalise Plant Process</button></a> -->
                         <button type="submit" class="btn btn-success" id="formSubmitProcess">View Machinery</button>
                          <button type="submit" class="btn btn-info"  id="hey">Finish</button>
                         <div id="responseMachinery"></div>

                        </ol>
                    </div>

                    <!--Add process-->
                     <div class="col-lg-4">
                        <h1 class="page-header">
                            <small id="responseMachineryName">Process Info </small>
                        </h1>
                        <ol class="breadcrumb" >
                            <div id="responseProcess" style="padding:5px; height:300px; width:500px; border:1px solid green;"></div>
                        </ol>
                    </div>

                     <div class="col-lg-4">
                        <h1 class="page-header">
                            <small>System Output </small>
                            <img src= "<?php echo URL; ?>public/images/download.png" height="30" width="50" style=" margin-left:300px;">
                        </h1>
                        <ol class="breadcrumb" >
                            <div id="responseProcesssOutput" style=" padding:5px; height:300px; width:500px; border:1px solid red;"></div>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>