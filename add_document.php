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
                <div class="panel-heading">Add Document</div>
                <div class="panel-body"> 
                    <form  class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="subject">Document name</label>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            <input type="text" class="form-control" id="document_name" name="document_name" required placeholder="Please enter the documents name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="description">Description</label>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            <textarea class="form-control tinyMCEselector" rows="5" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="document_upload">Upload document</label>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                            <input type="file" class="form-control" id="document_upload" name="document_upload" required placeholder="Please enter the documents name">
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" name="submit" value="addDocument" class="btn btn-success">Add</button>
                            <input type="hidden" name="action" value="addDocument">
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