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
    
        <?php
        include 'templates/navigation/side-menu.php';
        ?> 
        <!--Start of main col-->
        <div class="col-lg-10">
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <h4 class="clientinfo"><?php echo $data['viewclientprofile']['firstname'] ." ". $data['viewclientprofile']['lastname']; ?> - <?php echo $data['viewclientprofile']['id_number']; ?></h4>
                </div>
                </div>
                <div class="panel panel-default btnpanel">
                <div class="panel-body">
                    <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addDocument&clientid=<?php echo $data['viewclientprofile']['id']; ?>">
                    <div class="form-group">
                        <button type="submit" id="addnotes" class="btn btn-success">Add Document</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Documents</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Document name</th>
                          <th>Description</th>
                          <th>Download</th>
                        </tr>
                      </thead>                        
                      <tbody>
                        <?php
                        if(isset($data['documents']) && is_array($data['documents']) && count($data['documents'])>0){
                            $accArr = array();
                            foreach($data['documents'] as $document){
                               echo "<tr><td>".$document['document_name']."</td>
                                        <td>".$document['description']."</td>
                                        <td><a href='index.php?action=sendDocument&documentid=".$document['id']."'><span class='glyphicon glyphicon-download-alt'></span></a></td>";
                               echo "</tr>";
                            }
                        ?>
                      </tbody>
                      <?php } else {
                            echo '<tr><td colspan="4"><p class="lead text-center">There are no documents to display.</p></td></tr>';                              
                        } ?>
                      </tbody>
                    </table>
                    </div>
                </div>
                </div>
        </div>
        <!--End of main col-->
        <div class="col-lg-2"></div>

</div>
<?php
include 'templates/footers/default_footer_tpl.php';