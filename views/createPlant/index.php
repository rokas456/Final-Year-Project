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
                            Add Plant <span id="colorG" class="glyphicon glyphicon-plus" style="float:right"></span>
                            <small>Create Plant</small>
                        </h1>
                        <ol class="breadcrumb">

                            <h2>Add Plant</h2>
                            <form class="form-group form-group-md" action="<?php echo URL; ?>CreatePlant/createPlant" method="post" name="plantForm">
            				
            				<input type="text" placeholder="Plant Name" name="plantName"/>      

                            <br /><br />
                            <textarea rows="5" cols="80" id="comment" placeholder="Plant Description" name="plantDescription"></textarea>          

                                <br/> <br/>
                            <button type="submit" class="btn btn-primary">Next</button>

                             </form>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>