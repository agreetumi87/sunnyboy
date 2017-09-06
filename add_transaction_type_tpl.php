<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';
?> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2"></div>
        <!--Start of main col-->
        <div class="col-lg-8">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Add Transaction Type</div>
                <div class="panel-body"> 
                    <form class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">Name</label>
                        <div class="col-lg-7 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter a name for the transaction type.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description">Description</label>
                        <div class="col-lg-7 col-md-4 col-sm-8">
                            <textarea rows="10" class="form-control tinyMCEselector" name="description" id="description"></textarea>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="actiontype">Type of transaction</label>
                        <div class="col-lg-7 col-md-4 col-sm-8">
                            <select name="actiontype" id="actiontype" class="form-control">
                                 <option value="withdrawal">Withdrawal</option>
                                 <option value="deposit">Deposit</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <input type="hidden" name="action" value="saveTransactionType">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
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