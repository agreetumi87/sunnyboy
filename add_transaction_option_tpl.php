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
                <div class="panel-heading">Add client</div>
                <div class="panel-body"> 
                    <form class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="option_label">Label</label>
                        <div class="col-lg-7">
                        <input type="text" class="form-control" id="option_label" name="option_label" placeholder="Enter a label for the option.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="option_datatype">Datatype of input</label>
                        <div class="col-lg-7">
                            <select name="option_datatype" id="option_datatype" class="form-control">
                                <?php global $datatypes;
                                    foreach($datatypes as $datatype){ 
                                        echo '<option value="'.$datatype.'">'.$datatype.'</option>';
                                    } ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="form_input_type">Form Input Type</label>
                        <div class="col-lg-7">
                            <select name="form_input_type" id="form_input_type" class="form-control">
                                <?php global $inputtypes;
                                    foreach($inputtypes as $inputtype){ 
                                        echo '<option value="'.$inputtype.'">'.$inputtype.'</option>';
                                    } ?>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="form_input_data">Form Input Data</label>
                        <div class="col-lg-7">
                            <textarea rows="10" class="form-control tinyMCEselector" name="form_input_data" id="form_input_data"></textarea>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="saveTransactionOption">
                        <input type="hidden" name="type_id" value="<?php echo $data['type_id']; ?>">
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