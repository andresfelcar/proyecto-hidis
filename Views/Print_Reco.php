<?php
 @session_start();

 require_once "controller/Controller.php";

$result = $_SESSION['user'];
 if ($result == null) {
	 header("Location:login.php"); }
	 
	 

 $histo =  new Controller();
 $idreco = $_GET['printid'];



    if(!empty($_GET['printid']) && $_GET['printid']) {
 	$historial = $histo->Historial(5,array($_GET['printid']));	
 	$resultado=$historial->fetch_row();
 }


$output = '<table width="100%" height="300px" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	<b>PACIENTE</b><br />
	Nombres : '.$resultado[5].'<br /> 
	Telefono:  3194092899 <br />
	Documento : 1036673731 <br />
	<b>Historial HIDIS</b><br />
	</td>
	<td width="35%">         
	Historial No. : 0001 <br />
	Fecha:'.$resultado[4].'<br />
	HIDIS PROJECT<br/>
	Nit: 98620440-4<br/>        
	Direccion: Carre 53#58-78<br/>
	Medellin Antioquia<br/>   
	Info@hidis.com</td>
	</tr>
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Reco No.</th>
	<th align="left">Doctor</th>
	<th align="left">Recomendacion</th>
	<th align="left">Gravedad</th>
	<th align="left">Paciente</th>
	<th align="left">Fecha</th> 
	</tr>';
// $count = 0;
// while($itemsD_P=$invoiceValues[1]->fetch_row()){   

	// $count++;
	$output .= '
	<tr>
	<td align="left">2</td>
	<td align="left">'.$resultado[2].'</td>
	<td align="left">'.$resultado[3].'</td>
	<td align="left">'.$resultado[1].'</td>
	<td align="left">'.$resultado[5].'</td>
	<td align="left">'.$resultado[4].'</td>   
	</tr>';
//}
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'Historial-Hidis.pdf';

require_once 'dompdf/src/autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
// $dompdf->setPaper(array(0,0,454.33,478.90));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>
   