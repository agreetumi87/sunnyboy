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
             <div class="panel panel-default">
                <div class="panel-heading">Referrals</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>ID Number</th>
                          <th>Account Number</th>
                          <th>Date created</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $count = 1;
                            if(!empty($data['referrals'])){
                                foreach($data['referrals'] as $referralDetail){
                                echo "<tr>
                                        <td>" . $count . "</td>
                                        <td>" . $referralDetail['firstname'] . "</td>
                                        <td>" . $referralDetail['lastname'] . "</td>
                                        <td>" . $referralDetail['id_number'] . "</td>
                                        <td>" . $referralDetail['account_number'] . "</td>
                                        <td>" . date("D, d M y H:i:s O", strtotime($referralDetail['date_created'])) . "</td>";
                                        if($referralDetail['is_active']){  
                                            echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this referral.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivatereferral&id=" . $referralDetail['id'] . "&clientid=" . $_GET['clientid']. "'><img src=\"img/green_tick.jpg\" alt=\"Deactivate?\"/></a></td>";
                                        } else {  
                                            echo "<td><a data-toggle=\"tooltip\" title=\"Click to activate this referral.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activatereferral&id=" . $referralDetail['id'] . "&clientid=" . $_GET['clientid']. "'><img src=\"img/red_cross.jpg\" alt=\"Activate?\"/></a></td>";
                                        }     
                                        echo "
                                     </tr>";
                                    $count ++;
                                }
                            }else{
                                echo '<tr>
                                         <td colspan="7"><p class="lead text-center">There is currently no referrals</p></td>
                                      </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                    </div>
                    <form  class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        <div class="form-group">
                        <?php
                        echo '<label class="control-label col-sm-4" for="referredby">Referred</label>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                <select name="referredby" id="referredby">';
                                if(!empty($data['clientlist'])){  
                                    foreach($data['clientlist'] as $referralsList){
                                        echo "<option value='". $referralsList['id']. "'>" . $referralsList['firstname']." ". $referralsList['lastname']."</option>";
                                    }
                                }
                            echo '</select>
                            </div>'; 
                        ?>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" name="submit" value="addreferral" class="btn btn-success">Submit</button>
                            <input type="hidden" name="action" value="addreferral">
                            <input type="hidden" name="clientid" id="clientid" value="<?php echo $_GET['clientid']; ?>">
                            <a href='index.php?action=referrals&id=<?php echo $_GET['clientid'];?>'><button class="btn btn-success" type="button" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button></a>
                        </div>
                        </div>
                    </form>
                </div>
                </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';