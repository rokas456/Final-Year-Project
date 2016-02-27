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
                           Input Process Info
                            <small>Choose Process</small>
                        </h1>
                        <ol class="breadcrumb" id="processInputFirst">
                            <h2>Select Process</h2>
                             <div id="realTimeMachinery"></div>
                                 <br /> 
                                <select size="20"  class="form-control" id="selectPlantProcessNames" style="width:480px;">
                                </select>
                                <br />

                        </ol>
                    </div>

                    <div class="col-lg-4">
                        <h1 class="page-header">
                            <small id="inputProcessDataTitle">Input Data </small>
                         </h1>
                        <ol class="breadcrumb" id="processInputFirst">

                            <h3>Test outcome for  </h3>
                            
                                <select multiple class="form-control"  name="reason" id="processOutcome">
                                    <option>Success</option>
                                    <option>Failure</option>
                                </select>

                                <h3>Possible failure for  </h3>
                                <select size="5" class="form-control" id="possibleReason" name="possibleFailure">
                                    <option>Human Error</option>
                                    <option>Manufacturer</option>
                                    <option>Training</option>
                                </select>    

                                <h3>Faulty part for </h3>
                                <select size="5" class="form-control" name="possibleFailure" id="machSubpartsfailed">
                                </select>


                             <h3>Comment for </h3>
                            <textarea class="form-control" rows="5" id="processComment" name="comment"></textarea>
                                <br />
                            <input type="hidden" id="currentDate" value="<?php date_default_timezone_set('UTC'); echo date('Y-m-d'); ?>">

                            <button type="submit" class="btn btn-success" style="float:right" onclick="disableProcess()">Upload Test</button>

                        <div id="processInput">    
                       </div>
                        </ol> 
                       
                    </div>
                    <div class="col-lg-4">
                        <h1 class="page-header">
                            <span class="glyphicon glyphicon-upload" style="float:right" id="colorG"></span>
                            <small>System Output</small>
                         </h1>
                        <ol class="breadcrumb" id="processInputFirst">
                            <h2><span id="systemOutputProcess"> </span></h2>
                            <br />
                            <div id="processInputFeedback"></div>

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