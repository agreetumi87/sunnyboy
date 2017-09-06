<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITENAME; ?></title>
    <link rel="shortcut icon" href="img/favicon.png" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/bootsrap-form-helpers/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/fonts.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/select2.min.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet">
    
    <script type="text/javascript">
//    $(document).ready(function(){
//        $('#currency3').attr("onchange","currency3selected();");
//    }); 
//    </script>  
    
    <script type="text/javascript">
    
    function typeselected()
    {
        var typeid = document.getElementById("transaction_type_id").value;
	var div = document.getElementById(typeid);

	if (div.style.display !== "block") {
	    div.style.display = "block";
            document.getElementById("transactionselect").innerHTML = "<input type='hidden' name='transaction_type_id' value=" + typeid + ">Transaction selected.<a href='<?php echo BASE_URL; ?>/index.php?action=addTransaction&client_id=<?php echo $data["client_id"]; ?>'>Change selection?</a>";
	}
    }
    
//    function currency3selected()
//    {
//        if(document.getElementById("currency3").value !== "USD"){
//            if (document.getElementById("rate3").style.display !== "block") {
//                document.getElementById("rate3").style.display = "block";
//            }
//            else {
 //               document.getElementById("rate3").style.display = "none";
//            }
//            
//        }
//    }
    </script>

</head>
<body>