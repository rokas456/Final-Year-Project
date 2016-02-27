  </div>
    <!-- /#wrapper -->
<footer style="margin-top:160px; padding:10px;">Copyright @rokas lukosevicius software solutions<div data-toggle="modal" id="footerContact" style="float:right" data-target="#feedbackModel"><span class="glyphicon glyphicon-envelope" id="contactGlyphStyle"></span> Contact Us</div>

	<!-- Pop-up box for user feedback-->
                  <div id="feedbackModel" class="modal fade" role="dialog">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <div class="modal-title" id="contactTitle"><h2><span class="glyphicon glyphicon-envelope" style="float:left" id="contactGlyphStyle"></span> Feedback<h2></div>
                           </div>

                           <div class="modal-body">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="usernameUpdate" placeholder="Name" >
                                 </div>
                                 <div class="form-group">
                                    <input type="email" class="form-control" id="emailUpdate" placeholder="Email">
                                 </div>
                                 <div class="form-group">
									<textarea rows="5" cols="80" id="FeedbackMessage" placeholder="Message" name="plantDescription" class="form-control"></textarea>	
                                </div>                                  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal" id="updateUser">Send</button>
                           </div>
                        </div>
                     </div>
                  </div>

</footer>
    <!-- jQuery -->
    <script src="<?php echo URL; ?>public/js/jquery.js"></script>

     <script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
     <script type="text/javascript" src="<?php echo URL; ?>public/js/customTwo.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
    <script src="http://localhost:8080/ProcessManagment/Highcharts/js/highcharts.js"></script>
    <script src="http://localhost:8080/ProcessManagment/Highcharts/js/modules/exporting.js"></script>

</body>

</html>
