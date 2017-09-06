<?php
include 'templates/headers/default_header_tpl.php';
include 'templates/navigation/default_nav_tpl.php';

?> 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1"></div>
        <!--Start of main col-->
        <div class="col-lg-10">
            <div class="panel-group">
                <div class="panel panel-default">
                <div class="panel-heading">Edit fields</div>
                <div class="panel-body"> 
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">
                    <?php                   
                    $optformElements = array();
                    $optformElements['input'] = 'TEXTINPUT';
                    $optformElements['textarea'] = 'TEXTAREA';
                    $optformElements['checkbox'] = 'CHECKBOX';
                    $optformElements['radio'] = 'RADIO';
                    $optformElements['select'] = 'SELECT';
                    
                    foreach($data['editfields'] as $editFieldsList){
                        echo
                        '<div class="form-group">
                            <label class="control-label col-sm-4" for="fieldlabel">Field Label</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="fieldlabel" name="fieldlabel" value="' . $editFieldsList["field_label"].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="formelementtype">Create form element type</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                             <select class="form-control" name="fieldelementtype" id="fieldelementtype">';
                                
                                foreach($optformElements as $keyvalue=>$value){
                                    if($editFieldsList["form_element_type"] == $keyvalue ){
                                        echo '<option value="' . $keyvalue . '" selected >' . $value . '</option>';
                                    }else{
                                        echo '<option value="' . $keyvalue . '">' . $value . '</option>';
                                    }
                                }
                        echo                
                            '</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="fieldname">Field Name</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="fieldname" name="fieldname" value="' . $editFieldsList["field_name"].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="formelementdata">Form Element data</label>
                            <div class="col-lg-6 col-md-6 col-sm-8">
                                <textarea class="form-control tinyMCEselector" rows="5" name="formelementdata" id="formelementdata">' . $editFieldsList["form_element_data"] .'</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="fieldorder">Field order</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <select class="form-control" name="fieldorder" id="fieldorder">';
                            for($i = 1; $i <= 15; $i ++){
                                if($i == $editFieldsList["field_order"]){
                                   echo '<option value="' . $i . '" selected >' . $i . '</option>';
                                }else{
                                   echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }   
                        echo '</select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="categoryname">Category Name</label>
                            <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="categoryname" name="categoryname" value="' . $editFieldsList["category_name"].'">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                            <input type="hidden" name="action" value="editfields">
                            <input type="hidden" name="id" value="' . $editFieldsList["id"].'">
                            <button type="submit" name="submit" value="editFields" class="btn btn-success">Submit</button>
                            <button type="submit" name="submit" value="cancel" class="btn btn-default" formnovalidate="formnovalidate">Cancel</button>
                            </div>
                        </div>';
                    }
                    ?>
                        
                    </form>
                </div>
                </div>
                <!--End of panel-default-->
            </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-1"></div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';