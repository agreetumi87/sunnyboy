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
                <div class="panel-heading">Add Notes</div>
                <div class="panel-body"> 
                    <form  class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="subject">Subject</label>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            <input type="text" class="form-control" id="subject" name="subject" required placeholder="Please enter subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="note">Note</label>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            <textarea class="form-control tinyMCEselector" rows="5" name="note" id="note"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" name="submit" value="addClientNote" class="btn btn-success">Add</button>
                            <input type="hidden" name="action" value="addClientNote">
                            <input type="hidden" name="clientid" value="<?php echo $_GET['clientid']; ?>">
                            <a href='index.php?action=notes&id=<?php echo $_GET['clientid'];?>'><button class="btn btn-success" type="button" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Back</button></a>
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