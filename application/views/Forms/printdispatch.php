<?php
defined('BASEPATH') or die('Access Denied');

$DispatchID = '';
$companyName = '';
$customerName = '';
$contactPerson = '';
$contactNumber = '';
$dispatchDate = '';
$address = '';
$timeIn = '';
$timeOut = '';
$remarks = '';
$assignedTech1 = '';
$assignedTech2 = 'N/A';
$assignedTech3 = 'N/A';
$assignedTech4 = 'N/A';
$assignedTech5 = 'N/A';
$with_permit = '';
$typeOfService = '';

foreach ($results as $row) {
	$DispatchID = $dispatch_id;
	$companyName = $row->CompanyName;
	$customerName = $row->CustomerName;
	$contactPerson = $row->ContactPerson;
	$contactNumber = $row->ContactNumber;
	$dispatchDate = $row->DispatchDate;
	$address = $row->Address;

	if ($row->TimeIn == '00:00:00' or $row->TimeIn == '') {
		$timeIn = '';
	} else {
		$timeIn = date('g:i A',strtotime($row->TimeIn));
	}

	if ($row->TimeOut == '00:00:00' or $row->TimeIn == '') {
		$timeOut = '';
	} else {
		$timeOut =  date('g:i A',strtotime($row->TimeOut));
	} 	

	$remarks = $row->Remarks;

	if ($row->AssignedTechnicians1 == '') {
		$assignedTech1 = 'N/A';
	} else {
		$assignedTech1 = $row->AssignedTechnicians1;
	}

	if ($row->AssignedTechnicians2 == '') {
		$assignedTech2 = 'N/A';
	} else {
		$assignedTech2 = $row->AssignedTechnicians2;
	}

	if ($row->AssignedTechnicians3 == '') {
		$assignedTech3 = 'N/A';
	} else {
		$assignedTech3 = $row->AssignedTechnicians3;
	}

	if ($row->AssignedTechnicians4 == '') {
		$assignedTech4 = 'N/A';
	} else {
		$assignedTech4 = $row->AssignedTechnicians4;
	}

	if ($row->AssignedTechnicians5 == '') {
		$assignedTech5 = 'N/A';
	} else {
		$assignedTech5 = $row->AssignedTechnicians5;
	}

	if ($row->WithPermit == 'Yes') {
		$with_permit = 'Yes';
	} elseif($row->WithPermit == 'No') {
		$with_permit = 'No';
	} else {
		$with_permit = '';
	}

	if ($row->Installation == 1) {
		$typeOfService = 'Installation';
	}

	if ($row->RepairOrService) {
		$typeOfService = 'Service';
	}

	if ($row->Warranty) {
		$typeOfService = 'Warranty';
	}
}

$this->Myfpdf = new FPDF('p','mm','Letter');
$this->Myfpdf->AddPage();
$this->Myfpdf->SetAutoPageBreak(false);

$this->Myfpdf->SetFont('Times','B',18);

$this->Myfpdf->Image(base_url('assets/images/vinculumNewLogo.jpg'),10,10,44);

$this->Myfpdf->Cell(195,5,'',0,1,'C');
$this->Myfpdf->Cell(195,5,'Dispatch Form',0,1,'C');
$this->Myfpdf->Cell(195,5,'',0,1,'C');

$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(195,5,'Dispatch ID: '. $DispatchID,0,1,'R');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Customer Name',1,0,'');
$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(165,5,utf8_decode($customerName.' --- '.$companyName),1,1,'');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Contact Person',1,0,'');
$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(165,5,$contactPerson,1,1,'');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Contact Number',1,0,'');
$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(165,5,$contactNumber,1,1,'');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Address',1,0,'');
$this->Myfpdf->SetFont('Times','',11);

$fontSize = 11;
$tempFontSize = $fontSize;
while ( $this->Myfpdf->GetStringWidth($address) > 163.5) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
}
$this->Myfpdf->Cell(165,5,utf8_decode($address),1,1,'');
$tempFontSize = $fontSize;
$this->Myfpdf->SetFontSize($fontSize);

$this->Myfpdf->Cell(195,5,'',0,1,'');

$this->Myfpdf->SetFont('Times','B',10);
$this->Myfpdf->Cell(95,4,'Personnel/s',1,0,'C');
$this->Myfpdf->Cell(5,4,'',0,0,'C');
$this->Myfpdf->Cell(6,4,$with_permit,1,0,'C');
$this->Myfpdf->SetFont('Times','',10);
$this->Myfpdf->Cell(89,4,'With work permit?',1,1,''); // with permit checkbox

$this->Myfpdf->Cell(95,4,$assignedTech1,1,0,'');
$this->Myfpdf->Cell(5,4,'',0,0,'C');
$this->Myfpdf->Cell(95,4,'',0,0,'');

$this->Myfpdf->ln(4);
$this->Myfpdf->Cell(95,4,$assignedTech2,1,0,'');
$this->Myfpdf->Cell(5,4,'',0,0,'');
$this->Myfpdf->SetFont('Times','B',10);
$this->Myfpdf->Cell(30,4,'Activity Remarks',1,0,'');
$this->Myfpdf->ln(4);

$this->Myfpdf->SetFont('Times','',10);
$this->Myfpdf->Cell(95,4,$assignedTech3,1,0,'');
$this->Myfpdf->Cell(5,4,'',0,0,'');
$this->Myfpdf->MultiCell(95,4,'',1,'');


$this->Myfpdf->Cell(95,4,$assignedTech4,1,0,'');

$this->Myfpdf->ln(4);
$this->Myfpdf->Cell(95,4,$assignedTech5,1,0,'');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(195,5,'',0,1,'');
$this->Myfpdf->Cell(20,5,'Concern :',0,0,'');
$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->MultiCell(175,5,$remarks,1,'');

$this->Myfpdf->ln(10);
$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(20,5,'Time In',1,0,'');

$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(30,5,$timeIn,1,0,'');
$this->Myfpdf->Cell(5,5,'',0,0,'');
$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Type of Service',1,0,'');
$this->Myfpdf->Cell(35,5,'',0,0,'');
$this->Myfpdf->Cell(30,5,'Dispatch Date',1,1,'');

$this->Myfpdf->SetFont('Times','B',11);

$this->Myfpdf->Cell(20,5,'Time Out',1,0,'');

$this->Myfpdf->SetFont('Times','',11);

$this->Myfpdf->Cell(30,5,$timeOut,1,0,'');
$this->Myfpdf->Cell(5,5,'',0,0,'');
$this->Myfpdf->Cell(60,5,$typeOfService,1,0,'');
$this->Myfpdf->Cell(5,5,'',0,0,'');
$this->Myfpdf->Cell(75,5,date('l - F j, Y',strtotime($dispatchDate)),1,1,'');

$this->Myfpdf->ln(9);

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(48.75,5,'Customer Acceptance:',0,0,'');
$this->Myfpdf->Cell(35,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'Checked By:',0,0,'');
$this->Myfpdf->Cell(20.5,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'Dispatched By:',0,0,'');

$this->Myfpdf->ln(9);

$this->Myfpdf->Cell(48.75,5,'________________________________',0,0,'');
$this->Myfpdf->Cell(24.5,5,'',0,0,'C');
$this->Myfpdf->SetFont('Times','U',11);
$this->Myfpdf->Cell(48.75,5,'Jenina F. Gaceta',0,0,'C');
$this->Myfpdf->Cell(24.5,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'Irish Gale L. Serrano',0,0,'C');

$this->Myfpdf->ln(4);

$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(48.75,5,'Customer Signature over Printed Name',0,0,'');
$this->Myfpdf->Cell(24,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'HR Officer',0,0,'C');
$this->Myfpdf->Cell(25,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'Admin & Accounting',0,0,'C');

$this->Myfpdf->Output();
?>