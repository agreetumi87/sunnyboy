
<div class="row">
<div class="col-lg-2">
    <ul class="nav nav-pills nav-stacked side-bar">
        <li><a <?php if ($_GET['action'] == 'viewclientprofile'){echo "class=\"active\"";}?> href="index.php?action=viewclientprofile&id=<?php echo $_GET['id'];?>">Personal Details</a></li>
        <li><a <?php if ($_GET['action'] == 'accounts'){echo "class=\"active\"";}?> href="index.php?action=accounts&id=<?php echo $_GET['id'];?>">Accounts</a></li>
        <li><a <?php if ($_GET['action'] == 'referrals'){echo "class=\"active\"";}?> href="index.php?action=referrals&id=<?php echo $_GET['id'];?>">Referral</a></li>
        <li><a <?php if ($_GET['action'] == 'transactions'){echo "class=\"active\"";}?> href="index.php?action=transactions&id=<?php echo $_GET['id'];?>">Transaction</a></li>
        <li><a <?php if ($_GET['action'] == 'documents'){echo "class=\"active\"";}?> href="index.php?action=documents&id=<?php echo $_GET['id'];?>">Documents</a></li>
        <li><a <?php if ($_GET['action'] == 'notes'){echo "class=\"active\"";}?> href="index.php?action=notes&id=<?php echo $_GET['id'];?>">Notes</a></li>
    </ul>
</div>
<?php //End of the file ?>     
