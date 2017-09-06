<?php

include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';
$date = $data['date'];
$nextWeek = strtotime(date("Y-m-d", strtotime($date)) . " +1 week");
$nextWeek = date('Y-m-d', $nextWeek);
$previousWeek = strtotime(date("Y-m-d", strtotime($date)) . " -1 week");
$previousWeek = date('Y-m-d', $previousWeek);

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
        <div class="col-lg-12">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Transactions for week which contains date <?php echo $date; ?> </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="transactionsearch" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        <span class="input-group-addon"><i class="icon-search-4"></i></span>
                        <input type="hidden" name="action" value="searchTransactions">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="date">Search date</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                                <div class="bfh-datepicker" data-format="y-m-d" data-name="date" data-date="today"></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="transactionsearch" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        <span class="input-group-addon"><i class="icon-search-4"></i></span>
                        <input type="hidden" name="action" value="transpdf">
                        <input type="hidden" name="pdf" value="trans">
                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-8">
                                <button type="submit" class="btn btn-success">Download Weekly Client Transactions</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive"> 
                        <div class="navigation">
                            <div class="alignleft" style="float: left;">
                                <a href="<?php echo BASE_URL; ?>/index.php?action=searchTransactions&date=<?php echo $previousWeek; ?>" title="Previous Week">Previous Week</a>
                            </div>
                            <div class="alignright" style="float: right;">
                                <a href="<?php echo BASE_URL; ?>/index.php?action=searchTransactions&date=<?php echo $nextWeek; ?>" title="Next Week">Next Week</a>                                
                            </div>
                        </div>
                    <?php 
                    
                    $html = '<table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Surname</th>
                          <th>Account</th>
                          <th>Type</th>
                          <th>Action</th>
                          <th>Total value</th>
                          <th>Date of transaction</th>
                          <th>Exchange Rate</th>
                          <th>Current Balance</th>
                          <th>Added By</th>
                          <th>Status</th>
                          <th>Date Processed</th>
                        </tr>
                      </thead>                              
                      <tbody>';
                             
                        if(isset($data['transactions']) && is_array($data['transactions']) && count($data['transactions'])>0){
                            foreach($data['transactions'] as $transaction){
                                if(!is_null($transaction['transaction_data'])){   
                                    $dataArr = json_decode($transaction['transaction_data'], TRUE);
                                } 
                               $html .= "<tr>
                                     <td>". $transaction['firstname'] . "</td>
                                     <td>". $transaction['lastname'] . "</td>
                                     <td>". $transaction['account_name'] . "</td>
                                     <td> ". $transaction['name'] . "</td>
                                     <td>". $transaction['action_type'] . "</td>
                                     <td>$". $transaction['total_value'] . "</td>
                                     <td>". date("D, d M y H:i:s O", strtotime($transaction['date_of_transaction'])) . "</td>";
                                if(isset($dataArr['exchange_rate'])){
                                    $html .= "<td>". $dataArr['exchange_rate'] . "</td>";
                                } else {
                                     $html .= "<td></td>";
                                }
                                if(isset($dataArr['current_balance'])){
                                    $html .= "<td>$". $dataArr['current_balance'] . "</td>";
                                } else if(isset($dataArr['Current Balance'])){
                                    $html .= "<td>$". $dataArr['Current Balance'] . "</td>";
                                } else {
                                     $html .= "<td></td>";
                                }
                                
                                $html .= "<td>".$transaction['addedby']['firstname'].' '.$transaction['addedby']['lastname']."</td>";
                                
                                if($transaction['is_processed']){         
                                    $html .= "<td>Processed</td>";
                                    $html .= "<td>". date("D, d M y H:i:s O", strtotime($transaction['date_processed'])) . "</td>";
                                } else {  
                                    $html .= "<td>Not processed</td>";
                                    $html .= "<td> </td>";
                                }       
                               
                               $html .= "</tr>";
                            }
                        } else {
                           $html .= '<tr>
                                    <td colspan="12"><p class="lead text-center">There are no transactions to display.</p></td>
                                </tr>';                              
                        }    
                        
                      $html .= '</tbody>
                    </table>';
                      echo $html;
                    ?>    
                    </div>
                </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<?php
include 'templates/footers/default_footer_tpl.php';