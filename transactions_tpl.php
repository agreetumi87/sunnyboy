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
$pdf->SetTitle('Client transactions');
$pdf->SetSubject('Client transactions');
$pdf->SetKeywords('Clients, transactions');

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
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
                    $html = '<table class="table pdf-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Surname</th>
                          <th>Account</th>
                          <th>Type</th>
                          <th>Action</th>
                          <th>Total value</th>
                          <th>Date of transaction</th>
                          <th>Exchange Rate</th>
                          <th>Current Balance</th>
                          <th>Added By</th>
                          <th>Status</th>
                          <th>Date Processed</th>
                        </tr>
                      </thead>                              
                      <tbody>';
                             
                       if(isset($data['transactions']) && is_array($data['transactions']) && count($data['transactions'])>0){
                            foreach($data['transactions'] as $transaction){
                                if(!is_null($transaction['transaction_data'])){   
                                    $dataArr = json_decode($transaction['transaction_data'], TRUE);
                                } 
                               $html .= "<tr>
                                     <td>". $transaction['firstname'] . "</td>
                                     <td>". $transaction['lastname'] . "</td>
                                     <td>". $transaction['account_name'] . "</td>
                                     <td> ". $transaction['name'] . "</td>
                                     <td>". $transaction['action_type'] . "</td>
                                     <td>$". $transaction['total_value'] . "</td>
                                     <td>". date("D, d M y H:i:s O", strtotime($transaction['date_of_transaction'])) . "</td>";
                                if(isset($dataArr['exchange_rate'])){
                                    $html .= "<td>". $dataArr['exchange_rate'] . "</td>";
                                } else {
                                     $html .= "<td></td>";
                                }
                                if(isset($dataArr['current_balance'])){
                                    $html .= "<td>$". $dataArr['current_balance'] . "</td>";
                                } else {
                                     $html .= "<td></td>";
                                }
                                
                                $html .= "<td>".$transaction['addedby']['firstname'].' '.$transaction['addedby']['lastname']."</td>";
                                
                                if($transaction['is_processed']){         
                                    $html .= "<td>Processed</td>";
                                    $html .= "<td>". date("D, d M y H:i:s O", strtotime($transaction['date_processed'])) . "</td>";
                                } else {  
                                    $html .= "<td>Not processed</td>";
                                    $html .= "<td> </td>";
                                }       
                               
                               $html .= "</tr>";
                            }
                        } else {
                           $html .= '<tr>
                                    <td colspan="12"><p class="lead text-center">There are no transactions to display.</p></td>
                                </tr>';                              
                        }    
                        
                      $html .= '</tbody>
                    </table>';

    
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//echo $html;
//Close and output PDF document
$pdf->Output('transactions.pdf', 'I');
