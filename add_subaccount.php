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
                    <div class="panel-heading">Sub account for : 
                    <?php
                    foreach($data['mainaccount'] as $clientDetails){
                        echo $clientDetails['firstname'] .' '.$clientDetails['lastname'];
                    }
                    ?>
                    </div>
                <div class="panel-body"> 
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="firstname">First Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Enter firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="lastname">Surname</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="surname" name="lastname" required placeholder="Enter surname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="idNumber">ID Number</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="idNumber" name="idNumber" required placeholder="Enter ID Number">
                        </div>
                    </div>
                    <?php 
                    //TODO custom fields
                    echo
                    '<div class="form-group">
                        <label class="control-label col-sm-4" for="address">Physical Address</label>
                        <div class="col-lg-8 col-md-8">
                         <textarea class="form-control tinyMCEselector" name="address" id="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="relationship">Relationship </label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <select class="form-control" name="relationship" id="relationship">
                            <option value="1">Father</option>
                            <option value="2">Mother</option>
                            <option value="3">Brother</option>
                            <option value="4">Sister</option>
                            <option value="5">Friend</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" class="form-control" id="otherRelationship" name="otherRelationship" placeholder="Enter relationship">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="cellphone">Cell phone Number</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="cellphone" name="cellphone" required placeholder="Enter enter cellphone number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">E-mail address</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Enter enter email address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="bankDetails">Bank Details</label>
                        <div class="col-lg-8 col-md-8">
                        <textarea class="form-control tinyMCEselector" name="bankDetails" id="bankDetails"></textarea>
                        </div>
                    </div>';
                    ?>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="addsubaccount">
                        <input type="hidden" name="parendId" value="<?php echo filter_input(INPUT_GET,"id"); //TODO ?>">
                        <button type="submit" name="submit" value="addsubaccount" class="btn btn-success">Submit</button>
                        <button type="submit" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Cancel</button>
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