<?php @session_start();//session_start();?>


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <div class="alert alert-success fade in">
                                User <?php echo $_SESSION['username'] . ' succesfully logged in as '. $_SESSION['role']; ?> 
                            </div>

                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
