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
    
        <?php
        include 'templates/navigation/side-menu.php';
        ?> 
        <!--Start of main col-->
        <div class="col-lg-10">
            <div class="panel-group">
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <h4 class="clientinfo"><?php echo $data['viewclientprofile']['firstname'] ." ". $data['viewclientprofile']['lastname']; ?> - <?php echo $data['viewclientprofile']['id_number']; ?></h4>
                </div>
                </div>
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addreferral&clientid=<?php echo $data['viewclientprofile']['id']; ?>">
                    <div class="form-group">
                        <button type="submit" id="addReferral" class="btn btn-success">Add Referral</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Referrals</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Full name</th>
                          <th>ID number</th>
                          <th>Account number</th>
                          <th>Date created</th>
                        </tr>
                      </thead>                                                
                      <tbody>
                        <?php
                        if(isset($data['referrals']) && is_array($data['referrals']) && count($data['referrals'])>0){
                            foreach($data['referrals'] as $referralsDetails){
                               echo "<tr>
                                        <td><a href=\"index.php?action=viewclientprofile&id=".$referralsDetails['referer_client_id']."\">". $referralsDetails['firstname'] . "  ". $referralsDetails['lastname'] . "</a></td>
                                        <td>". $referralsDetails['id_number'] . "</td>
                                        <td>". $referralsDetails['account_number'] . "</td>
                                        <td>". date("D, d M y H:i:s O", strtotime($referralsDetails['date_created'])) . "</td>
                                    </tr>";
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="4"><p class="lead text-center">There are no referrals to display.</p></td>
                                </tr>';                              
                        }    
                        ?>
                      </tbody>
                    </table>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>

</div>
<?php
include 'templates/footers/default_footer_tpl.php';
