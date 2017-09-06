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
                    <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addTransaction&client_id=<?php echo $data['clientid']; ?>">
                    <div class="form-group">
                        <button type="submit" id="addtransactions" class="btn btn-success">Add Transaction</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Transactions</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Account</th>
                          <th>Type</th>
                          <th>Action</th>
                          <th>Total value</th>
                          <th>Date Processed</th>
                          <th>Exchange Rate</th>
                          <th>Current Balance</th>
                          <th>Details</th>
                        </tr>
                      </thead>                                                
                      <tbody>
                        <?php
                        if(isset($data['transactions']) && is_array($data['transactions']) && count($data['transactions'])>0){
                            foreach($data['transactions'] as $transaction){
                                if(!is_null($transaction['transaction_data'])){   
                                    $dataArr = json_decode($transaction['transaction_data'], TRUE);
                                }                                      
                               echo "<tr>
                                     <td>".$transaction['account_name']."</td>
                                     <td> ".$transaction['name'] . "</td>
                                     <td>". $transaction['action_type'] . "</td>
                                     <td>$". $transaction['total_value'] . "</td>
                                     <td>". date("D, d M y H:i:s O", strtotime($transaction['date_processed'])) . "</td>";
                               
                               if(isset($dataArr['exchange_rate'])){
                                    echo "<td>". $dataArr['exchange_rate'] . "</td>";
                                } else {
                                    echo "<td></td>";
                                }
                                
                                if(isset($dataArr['current_balance'])){
                                    echo "<td>$". $dataArr['current_balance'] . "</td>";
                                } else {
                                    echo "<td></td>";
                                }
                                
                                echo "<td>";
                                if(!is_null($transaction['transaction_data'])){   
                                    $dataArr = json_decode($transaction['transaction_data'], TRUE);
                                    echo "<ul>";
                                    foreach($dataArr as $key => $value){
                                        echo '<li>'.$key.':  '.$value.'</li>';
                                    }
                                    echo "</ul>";
                                } 
                                
                               echo "</td>";
                               echo "</tr>";
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="6"><p class="lead text-center">There are no transactions to display.</p></td>
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
