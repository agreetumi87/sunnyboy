<?php

include 'templates/headers/default_header_tpl.php';

include 'templates/navigation/default_nav_tpl.php';

?>

<div class="container-fluid">
    <?php    include 'templates/headers/notification_tpl.php'; ?>    
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Add a new transaction</div>
                <div class="panel-body">
                    <?php if(isset($_SESSION['exchange_rate']['exchange_rate']) && date('Y-m-d') == date('Y-m-d', strtotime($_SESSION['exchange_rate']['date_of_rate']))){
                    if(isset($_SESSION['exchange_rate']['exchange_rate'])){ ?>
                    <form class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        
                    <?php if(count($data['accounts'])>1){ ?>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="account_id">Select account</label>
                        <div class="col-lg-7 col-md-4 col-sm-8">
                            <select name="account_id" id="account_id" class="form-control">
                                <?php foreach($data['accounts'] as $acc){
                                    echo  '<option value="'.$acc['id'].'">'.$acc['account_name'].'</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <?php } else { ?>
                    <input type="hidden" name="account_id" value="<?php echo $data['accounts'][0]['id']; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="transaction_type_id">Select transaction type</label>
                        <div class="col-lg-7 col-md-4 col-sm-8" id="transactionselect">
                            <select name="transaction_type_id" id="transaction_type_id" class="form-control" onchange="typeselected();">
                                 <option disabled selected value> -- Select a transaction type -- </option>
                                <?php foreach($data['transaction_types'] as $type){
                                    echo  '<option value="'.$type['id'].'">'.$type['name'].'</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <!-- For Deposit fixed sum -->
                    <div id="3" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="currency3">Currency</label>
                            <div class="col-lg-7">
                                <div class="bfh-selectbox bfh-currencies" data-name="currency3" data-currency="ZAR" data-currencyList="USD,ZAR" data-flags="true" data-filter="true" ></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="amount3">Amount</label>
                            <div class="col-lg-7">
                                <input type="number" class="form-control" id="amount3" name="amount3" min="0.01" step="0.01" placeholder="Enter amount of specified currency to be deposited.">
                            </div>
                        </div>
                    </div>    

                    <!-- For Withdraw fixed sum -->
                     <div id="4" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="currency4">Currency</label>
                            <div class="col-lg-7">
                                <div class="bfh-selectbox bfh-currencies" data-name="currency4" data-currency="ZAR" data-currencyList="USD,ZAR" data-flags="true" data-filter="true" ></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="amount4">Amount</label>
                            <div class="col-lg-7">
                                <input type="number" class="form-control" id="amount4" name="amount4" min="0.00" step="0.01" placeholder="Enter amount of specified currency to be deposited.">
                            </div>
                        </div>
                    </div>    

                    <!-- For Withdraw percentage of growth -->
                     <div id="5" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="currency5">Currency</label>
                            <div class="col-lg-7">
                                <div class="bfh-selectbox bfh-currencies" data-name="currency5" data-currency="ZAR" data-currencyList="USD,ZAR" data-flags="true" data-filter="true" ></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="period5">Period</label>
                            <div class="col-lg-7 col-md-4 col-sm-8">
                            <select name="period5" id="period5" class="form-control">
                                 <option value="week">Week</option>
                                 <option value="month">Month</option>
                            </select>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="percentage5">Percentage</label>
                            <div class="col-lg-7">
                                <input type="number" class="form-control" id="percentage5" name="percentage5" min="0.00" step="0.01" max="8.00" placeholder="Enter the percentage of the growth to be withdrawn.">
                            </div>
                        </div>
                    </div>    
                    

                    <!-- For withdrawal of referal growth -->
                    <div id="6" style="display: none;">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="currency6">Currency</label>
                            <div class="col-lg-7">
                                <div class="bfh-selectbox bfh-currencies" data-name="currency6" data-currency="ZAR" data-currencyList="USD,ZAR" data-flags="true" data-filter="true" ></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="period6">Period</label>
                            <div class="col-lg-7 col-md-4 col-sm-8">
                            <select name="period6" id="period6" class="form-control">
                                 <option value="week">Week</option>
                                 <option value="month">Month</option>
                            </select>
                            </div>
                        </div>
                        
                    </div>    


                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <input type="hidden" name="action" value="saveTransaction">
                            <input type="hidden" name="client_id" value="<?php echo $data['client_id']; ?>">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                    
                    </form>
                    <?php } else { ?>
                    <p>Please set the exchange rate for the day before adding a transaction.</p>
                    <?php } ?>
                </div>                    
                </div>
            </div>
                <!--End of panel-default-->
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>
    </div>
</div>

<?php

include 'templates/footers/default_footer_tpl.php';                    
