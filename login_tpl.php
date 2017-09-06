<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';
?>  
<div class="container-fluid">
    <?php include 'templates/headers/notification_tpl.php'; ?>   
    <div class="row">
        
        <div class="login col-lg-4 col-md-4">
            <form class="login-form form-horizontal" method="post" action="index.php"> 
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Email address</label>
                    <div class="col-sm-8">
                    <input type="email" name="email"  class="form-control sm-box-input" placeholder="Type your email address" required="true">
                    <p><span class='errortext'></span></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="password">Password</label>
                    <div class="col-sm-8">
                    <input type="password" name="password" class="form-control sm-box-input" placeholder="Type your password" required="true">
                    <p><span class='errortext'></span></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input name="action" value="processlogin" type="hidden">
                    <input type="submit" value="Log in" name="login" class="btn btn-default btn-style-one">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <!-- Trigger the modal with a button -->
                      <button type="button" class="btn btn-default btn-style-one" data-toggle="modal" data-target="#myModal">Forgot Password</button>
                    </div>
                </div>
            </form>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="color: black;">Password Reset</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="post" action="index.php">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Enter email address:</label>
                            <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                            <input name="action" value="resetUserPassword" type="hidden">
                            <input class="btn btn-default btn-style-three" type="submit" value="Reset password" name="password">
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!--End of Modal -->
        </div>
        
        <div class="col-lg-8 col-md-8">
            <img src="img/logo.png" width="100%" >
        </div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';