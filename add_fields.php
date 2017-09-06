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
                <div class="panel-heading">Fields</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                              <th>#</th>
                              <th>Field label</th>
                              <th>Field name</th>
                              <th>Category name</th>
                              <th>Form element type</th>
                              <th>Date created</th>  
                              <th></th>
                              <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 1;
                            if(!empty($data['viewfields'])){
                                
                                foreach($data['viewfields'] as $formFieldsList){
                                    echo "<tr>
                                            <td>" . $count . "</td>
                                            <td>" . $formFieldsList['field_label'] . "</td>
                                            <td>" . $formFieldsList['field_name'] . "</td>
                                            <td>" . $formFieldsList['category_name'] . "</td>
                                            <td>" . $formFieldsList['form_element_type'] . "</td>
                                            <td>" . date("D, d M y H:i:s O", strtotime($formFieldsList['created_by'])). "</td>
                                            <td><a href=\"" . BASE_URL . "/index.php?action=editfields&id=" . $formFieldsList['id'] . '">
                                                <img width="16px" height="16px" src="' . BASE_URL .'/img/edit.png" /></a></td>
                                            <td><a  href="' . BASE_URL . "/index.php?action=deletefields&id=" . $formFieldsList['id'] . '">
                                                <img src="' . BASE_URL. '/img/activate.png" /></a></td>
                                         </tr>';
                                    $count ++;
                                }
                                    
                            }
                        ?>     
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <div class="col-sm-offset-4 col-sm-8">
                        <button type="button" name="submit" id="btnAddfields" class="btn btn-success">Add fields</button>
                        </div>
                    </div>     
                </div>
                    
                <div class="panel panel-default" id="addfieldsform">
                <div class="panel-heading">Add custom fields</div>
                <div class="panel-body"> 
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo BASE_URL; ?>/index.php">               
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fieldlabel">Field Label</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="fieldlabel" name="fieldlabel" placeholder="Please enter field label">
                        </div>
                    </div>
                    <div class="form-group">  
                        <label class="control-label col-sm-4" for="fieldelementtype">Form Element Type</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                         <select class="form-control" name="fieldelementtype" id="fieldelementtype">
                            <option value="TEXTINPUT">TEXT INPUT</option>
                            <option value="TEXTAREA">TEXT AREA</option>
                            <option value="CHECKBOX">CHECKBOX</option>
                            <option value="RADIO">RADIO BUTTON</option>
                            <option value="SELECT">DROPDOWN MENU</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="formelementdata">Form Element data</label>
                        <div class="col-lg-6 col-md-6 col-sm-8">
                            <textarea class="form-control tinyMCEselector" rows="5" name="formelementdata" id="formelementdata"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fieldname">Field Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="fieldname" name="fieldname" placeholder="Please enter field name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fielddatatype">Field datatype</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <select class="form-control" name="fielddatatype" id="fielddatatype">
                                <option value="NUMBER">NUMBER</option>
                                <option value="DATETIME">DATETIME</option>
                                <option value="STRING">STRING</option>
                            </select>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="fieldorder">Field order</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <select class="form-control" name="fieldorder" id="fieldorder" required>
                                <?php 
                                for($i=1; $i <= 15; $i++){
                                    echo '<option value="' .$i. '">' .$i. '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="categoryname">Category Name</label>
                        <div class="col-lg-4 col-md-4 col-sm-8">
                            <input type="text" class="form-control" id="categoryname" name="categoryname" required placeholder="Please enter category name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <input type="hidden" name="action" value="addfields">
                        <button type="submit" name="submit" value="addcustomfields" class="btn btn-success">Submit</button>
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
        <div class="col-lg-1"></div>
    </div>
</div>
<?php
include 'templates/footers/default_footer_tpl.php';