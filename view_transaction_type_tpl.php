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
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">Transaction options<a data-toggle="tooltip" title="Click to add an option to this transaction type." class="tooltipcustom" href="<?php echo BASE_URL; ?>/index.php?action=addTransactionOption&typeid=<?php echo $data['type_id']; ?>"><img height="20px" width="20px" src="img/green_cross.jpeg" alt="Add a transaction option"/></a></div>
                <div class="panel-body"> 
                    <div class="table-responsive">          
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Label</th>
                          <th>Datatype</th>
                          <th>Form Input Type</th>
                          <th>Form Input Data</th>
                          <th>Date Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $count = 1;
                          
                            foreach($data['options'] as $optionDetail){
                            echo "<tr>
                                    <td>" . $count . "</td>
                                    <td>" . $optionDetail['option_label'] . "</td>
                                    <td>" . $optionDetail['option_datatype'] . "</td>
                                    <td>" . $optionDetail['form_input_type'] . "</td>
                                    <td><pre><code>" . $optionDetail['form_input_data'] . "</code></pre></td>
                                    <td>" . $optionDetail['date_created'] . "</td>";
                                if($optionDetail['is_active']){         
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this transaction option.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateOption&id=" . $optionDetail['id'] . "&typeid=".$optionDetail['transaction_type_id']."'><img src=\"img/green_tick.jpg\" alt=\"Deactivate?\"/></a></td>";
                                } else {  
                                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to activate this transaction option.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateOption&id=" . $optionDetail['id'] . "&typeid=".$optionDetail['transaction_type_id']."'><img src=\"img/red_cross.jpg\" alt=\"Activate?\"/></a></td>";
                                }       
                                 echo "</tr>";
                                $count ++;
                            }
                            ?>
                      </tbody>
                    </table>
                    </div>                    
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