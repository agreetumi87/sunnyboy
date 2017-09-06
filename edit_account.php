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
                <div class="panel-heading">Edit account</div>
                <div class="panel-body"> 
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="accountname">Account Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="accountname" name="accountname" value="<?php echo $data['editaccount']['account_name']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="balance">Balance</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="balance" name="balance" value="<?php echo $data['editaccount']['balance']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="editclientaccount">
                        <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">
                        <input type="hidden" name="clientid" value="<?php if(isset($_GET['clientid'])){ echo $_GET['clientid']; } ?>">
                        <button type="submit" name="submit" value="editclientaccount" class="btn btn-success">Submit</button>
                        <button type="submit" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button>
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