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
                    <div class="col-lg-8">

                        <h1 class="page-header">
                            Create Plant
                            <small>Create machinery for <?php echo $_SESSION['pName']?></small>
                        </h1>
                        <ol class="breadcrumb" >

                            <h2>Add Machinery</h2>
                            <!-- <form class="form-group form-group-md" action="createPlant/createMachinery" method="post" name="plantForm"> -->

            				
            				<input type="text" placeholder="Machinery Name" id="machineryName">
            				<br/> <br/>
            				<textarea rows="5" cols="80" placeholder="Machinery Description" id="machDescription"></textarea>   
            				<br/> <br/>
            				<h2>Aquired Date</h2>
            				<input type="date" name="bday" id="aquirydate">     
            				<br/> <br/>
            				<h2>Expiry Date</h2>
            				<input type="date" name="bday" id="expiryDate">  
            				<h2>Maintanance Date</h2>
            				<input type="date" name="bday" id="maintananceDate">                

                            <br/> <br/>
                            <button type="submit" class="btn btn-primary" id="addMachinerySubmit">Add Machinery</button>
                            <a href="<?php echo URL;?>/CreatePlant/createProcess"><button type="submit" class="btn btn-success" >Next</button></a>

                             <!-- </form>-->


                        </ol>   

                    </div>

                     <div class="col-lg-4">

                        <h1 class="page-header">
                            Added
                            <small>Machinery</small>
                        </h1>
                        <ol class="breadcrumb">
                            <div id="response" style="color:red; height:300px; width:400px; border:2px solid red;"></div>
                     </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("views/loginStyles/footer.php"); ?>