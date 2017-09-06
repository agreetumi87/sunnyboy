<?php

// Include the main TCPDF library (search for installation path).
include_once ROOT.'/includes/tcpdf/tcpdf.php';


global $db;

$sql = "SELECT `firstname`, `lastname`, `id_number`, `account_number`, `account_name`, `balance`, `is_primary` FROM `tbl_client_accounts` JOIN `tbl_clients` ON tbl_client_accounts.client_id = tbl_clients.id WHERE tbl_client_accounts.is_active = 1 ORDER BY `client_id`";
$accountsArr = $db->getAll($sql);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sunnyboy Mathole');
$pdf->SetTitle('Account balances');
$pdf->SetSubject('Client account balances');
$pdf->SetKeywords('Accounts, balances, clients');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(0, 0, 0);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
//$pdf->setFooterData($tc=array(0,0,0), $lc=array(0,0,0));
// set font
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h2>Client account balances</h2>
    <div style="margin-left: 50px;">
    <table border="1" cellpadding="7" width="97%" >
    <thead>
    <tr>
    <th><b>Client name</b></th><th><b>ID number</b></th><th><b>Account number</b></th><th><b>Account name</b></th><th><b>Balance</b></th>
    </tr>
    </thead>
    <tbody>';
if(is_array($accountsArr) && count($accountsArr)>0){
    foreach($accountsArr as $account){
        $html .= '<tr>
                    <td>'.$account['firstname'].' '.$account['lastname'].'</td>  
                    <td>'.$account['id_number'].'</td>  
                    <td>'.$account['account_number'].'</td>  
                    <td>'.$account['account_name'].'</td>  
                    <td>$'.$account['balance'].'</td>  
                  </tr>';        
    }
} else {
    $html .= '<tr>
                <td colspan="5">There are no accounts to view.</td>  
             </tr>';
}    
$html .= '</tbody>
        </table>
        </div>';        
    
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//echo $html;
//Close and output PDF document
$pdf->Output('balances.pdf', 'I');