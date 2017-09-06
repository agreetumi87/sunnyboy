<div class="panel panel-default">
            <div class="panel-heading">Daily Exchange Rate</div>
            <div class="panel-body"> 
                <?php if(isset($_SESSION['exchange_rate']) && is_array($_SESSION['exchange_rate'])){ ?>
                    <p>1 Dollar - <?php echo $_SESSION['exchange_rate']['exchange_rate']; ?> Rand</p>
                    <?php if(isset($_SESSION['exchange_rate']['exchange_rate']) && date('Y-m-d') == date('Y-m-d', strtotime($_SESSION['exchange_rate']['date_of_rate']))){ ?>
                        <p>Today at <?php echo date('H:i - d F Y', strtotime($_SESSION['exchange_rate']['date_of_rate'])); ?></p>
                    <?php } else { ?>
                        <p><?php echo date('l d F Y -H:i', strtotime($_SESSION['exchange_rate']['date_of_rate'])); ?></p>
                    <?php } ?>
                    <p>User: <?php echo $_SESSION['exchange_rate']['added_by']['firstname'].' '.$_SESSION['exchange_rate']['added_by']['lastname']; ?></p>
                <?php } else { ?>    
                    <p>Please set the daily exchange rate.</p>
                <?php } ?>    
            <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Set Daily Exchange Rate</button>
            </div>
            </div>
            <!--End of panel-default-->
</div>

<!--Branch Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Daily Exchange Rate</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <form class="form-horizontal" id="exhangerate-form" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <input type="hidden" name="action" value="saveexchangerate">
                    <div id="rate" class="form-group">
                        <label class="control-label col-sm-4" for="exchange_rate">Exchange rate</label>
                        <div class="col-lg-7">
                            <input type="number" class="form-control" id="exchange_rate" name="exchange_rate" min="0.00" step="0.01" placeholder="Enter the exchange rate for the day.">
                        </div>
                    </div>        

            </div>
            </div>
            <div class="modal-footer">
                <button onclick="this.form.submit();" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>    
        </div>
    </div>
</div>
