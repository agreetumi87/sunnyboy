<?php
/**
 * Ajax script to search clientreferrals
 * 
 * @package letlivesystem
 * @author Sunnyboy Mathole <sunnyboy@innovatorshill.co.za>
 * @copyright (c) 2016, Innovators Hill
 * @license 
 */
//Include the common file
require_once '../../common.php';

processAjax();

function processAjax() 
{
    global $db;
    $serchterm = strip_tags(trim($_GET["q"]));
    $clientid = strip_tags(trim($_GET["c"]));    
    
    $searchSql = "SELECT id, firstname, lastname, id_number FROM tbl_clients WHERE (CONCAT(firstname, ' ', lastname) LIKE '%" . $serchterm ."%' OR id_number LIKE '%" . $serchterm ."%') AND (id !=" . $clientid . ") LIMIT 20";
    $searchLists = $db->getall($searchSql);
    
    if(!empty($searchLists)){
        foreach($searchLists as $searchList){
            $data[] = array("id"=>$searchList["id"], "text"=>$searchList["id"] .". " .$searchList["firstname"] . " " .$searchList["lastname"] . " - " . $searchList["id_number"]);
        }
    }else{
            $data[] = array("id"=>"0", "text"=>"Client Not Found");
    }
    
    //return the result in jason
    echo json_encode($data);  
}
   