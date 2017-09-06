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
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <h4 class="clientinfo"><?php echo $data['viewclientprofile']['firstname'] ." ". $data['viewclientprofile']['lastname']; ?> - <?php echo $data['viewclientprofile']['id_number']; ?></h4>
                </div>
                </div>
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addclientaccount&clientid=<?php echo $data['viewclientprofile']['id']; ?>">
                    <div class="form-group">
                        <button type="submit" id="addClient" class="btn btn-success">Add Account</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Accounts<a data-toggle="tooltip" title="Click to create a new account for the client." class="tooltipcustom" href="<?php echo BASE_URL; ?>/index.php?action=addclientaccount&clientid=<?php echo $data['viewclientprofile']['id']; ?>"></a> 
                </div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Account name</th>
                          <th>Balance</th>
                          <th>Is primary account</th>
                          <th></th>
                        </tr>
                      </thead>                        
                      <tbody>
                        <?php
                        if(isset($data['accounts']) && is_array($data['accounts']) && count($data['accounts'])>0){
                            $accArr = array();
                            foreach($data['accounts'] as $account){
                                $accArr[$account['id']] = $account['account_name'];
                               echo "<tr><td>". $account['account_name'] . "</td>
                                    <td>$". $account['balance'] . "</td>";
                               if($account['is_primary']){
                                    echo "<td>Yes</td>";
                               } else {
                                   echo "<td>No</td>";
                               }     
                               echo "<td>
                                    <a data-toggle=\"tooltip\" title=\"Click to edit this account.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=editclientaccount&clientid=".$_GET['id']."&id=" . $account['id'] . 
                                    "'><span class='glyphicon glyphicon-pencil'></span></a></td>
                                    </tr>";
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="3"><p class="lead text-center">There are no accounts to display.</p></td>
                                </tr>';                              
                        }      
                        ?>

                      </tbody>
                    </table>
                    </div>
                </div>
                </div>
      
                
      
                
                
 
                
                
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>

</div>
<?php
include 'templates/footers/default_footer_tpl.php';
