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
                    <form class="form-inline" method="post" action="<?php echo BASE_URL; ?>/index.php?action=addClientNote&clientid=<?php echo $data['viewclientprofile']['id']; ?>">
                    <div class="form-group">
                        <button type="submit" id="addnotes" class="btn btn-success">Add Notes</button>
                    </div>
                    </form>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Notes</div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Subject</th>
                          <th>Date created</th>
                        </tr>
                      </thead>                                                
                      <tbody>
                        <?php
                        if(isset($data['notes']) && is_array($data['notes']) && count($data['notes'])>0){
                            $count = 1;
                            foreach($data['notes'] as $note){
                          echo "<tr>
                                   <td>". $count."</td>
                                   <td>". $note['subject']."</td>
                                   <td>". date("D, d M y H:i:s O", strtotime($note['date_created'])) . "</td>
                                </tr>
                                <tr>
                                    <td colspan=\"3\"><pre>". $note['note'] . "</pre></td>
                                </tr>";
                               $count++;
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="4"><p class="lead text-center">There are no notes to display.</p></td>
                                </tr>';                              
                        }    
                        ?>
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