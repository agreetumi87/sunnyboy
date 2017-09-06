<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';
?> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8">
            <?php include 'templates/headers/notification_tpl.php'; ?>
            </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <?php if(!($_SESSION['is_superadmin'])){ ?> 
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <a href="<?php echo BASE_URL; ?>/index.php?action=changeUserPassword">
                                <h4 class="dashboard-heading">Change Password</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo BASE_URL; ?>/index.php?action=changeUserPassword">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <a href="<?php echo BASE_URL; ?>/index.php?action=transactionManagement">
                                <h4 class="dashboard-heading">Last login</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo BASE_URL; ?>/index.php?action=transactionManagement">
                        <div class="panel-footer">
                            <span class="pull-left"><p>View Details</p></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            </div>
            <?php } ?> 
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">My Profile
                <a data-toggle="tooltip" title="Click to edit user information." class="tooltipcustom" href="<?php echo BASE_URL; ?>/index.php?action=editUser&id=<?php echo $data['edituser']['id']; ?>"><span class="glyphicon glyphicon-pencil pull-right"></span></a>
                </div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>First name</td>
                          <td><?php echo $data['edituser']['firstname'];?></td>
                        </tr>
                        <tr>
                          <td>Surname</td>
                          <td><?php echo $data['edituser']['lastname'];?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><?php echo $data['edituser']['email'];?></td>
                        </tr>
                        <tr>
                          <td>Last login</td>
                          <td><?php echo date("D, d M y H:i:s O", strtotime($data['edituser']['last_login'])); ?></td>
                        </tr>
                        <tr>
                          <td>Date created</td>
                          <td><?php echo date("D, d M y H:i:s O", strtotime($data['edituser']['date_created']));?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>  
                </div>
                </div>
                <!--End of panel-default-->
                <div class="panel panel-default">
                    <div class="panel-heading">Last login</div>
                    <div class="panel-body">
                        <table class="table">
                        <tbody>
                          <?php
                          if(!empty($data['userlog'])){
                              foreach($data['userlog'] as $userLogDetails){
                                echo "<tr><td>" . date("D, d M y H:i:s O", strtotime($userLogDetails['last_login'])) ."</td></tr>";
                              }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                <!--End of panel-default-->
              </div>
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>
<script>
<?php
include 'templates/footers/default_footer_tpl.php';            