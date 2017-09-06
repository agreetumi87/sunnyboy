    <div class="inpage-wrapper">
        
        <section class="search-results-wrapper">
            <div id="search_results">
                <?php if(isset($data['searchresults']) && count($data['searchresults'])>0){ 
    $i = 1; ?>
    <div id="row-reset">
    <h3>Search Results</h3>
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th style="width: 200px;">ID Number</th>
                <th style="width: 200px;">Account Number</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            
            <?php foreach($data['searchresults'] as $client){ ?>
            <tr>
                <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>"><?php echo $client['firstname']; ?></a></td>
                <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>"><?php echo $client['lastname']; ?></a></td>
                <td><?php echo $client['id_number']; ?></td>
                <td><?php echo $client['account_number']; ?></td>
                <td><?php echo($client['is_active'] == 1 ? 'Active' : 'Inactive' )?></td>
            <td><?php echo date("D, d M y H:i:s O", strtotime($client['date_created']))?></td>
            <td><a href="index.php?action=viewclientprofile&id=<?php echo $client['id']; ?>">view profile</a></td>
            <td><a href="index.php?action=addclient&id=<?php echo $client['id']; ?>"><span class='glyphicon glyphicon-plus-sign'></span></a></td>
            <td>
                <?php
                if($client['is_active']){         
                    echo "<td><a data-toggle=\"tooltip\" title=\"Click to deactivate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=deactivateclientdashboard&id=" . $client['id'] . "'><span class='glyphicon glyphicon-ok-sign'></span></a></td>";
                } else {  
                    echo "<td><a  data-toggle=\"tooltip\" title=\"Click to activate this client.\" class=\"tooltipcustom\" href='" . BASE_URL . "/index.php?action=activateclientdashboard&id=" . $client['id'] . "'><span class='glyphicon glyphicon-exclamation-sign'></span></a></td>";
                }
                ?>
            </td>
            </tr>
            <?php } ?>
        </table>
    </div>
<?php } else { ?>
    <div id="row-reset">
    <h3>Search Results</h3>
            <table class="table">
                    <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th style="width: 200px;">ID Number</th>
                <th style="width: 200px;">Account Number</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
                    <tr>
                        <td colspan="10" style="text-align: center;"><b>There are no results to display.</b></td>
                    </tr>
             </table>
    </div>
<?php } ?>
            </div>
        </section>

</div>