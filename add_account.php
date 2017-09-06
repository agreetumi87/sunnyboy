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
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Add new account</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Account name</th>
                          <th>Balance</th>
                          <th>Account type</th>
                          <th>Date created</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $count = 1;
                            if(!empty($data['account'])){
                                foreach($data['account'] as $accountDetail){
                                echo "<tr>
                                        <td>" . $count . "</td>
                                        <td>" . $accountDetail['account_name'] . "</td>
                                        <td>" . $accountDetail['balance'] . "</td>
                                        <td>" . $accountDetail['is_primary'] . "</td>
                                        <td>" .  date("D, d M y H:i:s O", strtotime($accountDetail['date_created'])) . "</td>";
                                if($accountDetail['is_active']){         
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateAccount&id=" . $accountDetail['id'] . "&clientid=" . $_GET['clientid']."'><img src=\"img/green_tick.jpg\" alt=\"Deactivate?\"/></a></td>";
                                } else {  
                                    echo "<td><a  data-toggle=\"tooltip\" title=\"Click to activate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateAccount&id=" . $accountDetail['id'] . "&clientid=" . $_GET['clientid']."'><img src=\"img/red_cross.jpg\" alt=\"Activate?\"/></a></td>";
                                }
                                echo "</td>
                                     </tr>";
                                    $count ++;
                                }
                            }else{
                                echo '<tr>
                                         <td colspan="7"><p class="lead text-center">There is currently no account</p></td>
                                      </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="accountname">Account Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="accountname" name="accountname" required placeholder="Enter account name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="balance">Balance</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="surname" name="balance" required placeholder="Enter initial balance">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="addclientaccount">
                        <input type="hidden" name="clientid" value="<?php if(isset($_GET['clientid'])){ echo $_GET['clientid']; } ?>">
                        <button type="submit" name="submit" value="addclientaccount" class="btn btn-success">Submit</button>
                        <a href='index.php?action=accounts&id=<?php echo $_GET['clientid'];?>'><button class="btn btn-success" type="button" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button></a>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <!--End of panel-default-->
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';