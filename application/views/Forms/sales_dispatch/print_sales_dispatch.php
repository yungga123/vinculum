<?php

defined('BASEPATH') or die('Access Denied');

$dispatch_date = "";
$dispatch_time = "";
$assigned_sales = "";
$address = "";
$customer_1 = "";
$purpose_1 = "";
$time_in_1 = "";
$time_out_1 = "";
$customer_2 = "";
$purpose_2 = "";
$time_in_2 = "";
$time_out_2 = "";
$customer_3 = "";
$purpose_3 = "";
$time_in_3 = "";
$time_out_3 = "";
$customer_4 = "";
$purpose_4 = "";
$time_in_4 = "";
$time_out_4 = "";

foreach ($results as $row) {
	$dispatch_date = $row->dispatch_date;
	$dispatch_time = $row->dispatch_time;
	$assigned_sales = $row->assigned_sales;
	$address = $row->address;
	$customer_1 = $row->customer_1;
	$purpose_1 = $row->purpose_1;
	$time_in_1 = $row->time_in_1;
	$time_out_1 = $row->time_out_1;
	$customer_2 = $row->customer_2;
	$purpose_2 = $row->purpose_2;
	$time_in_2 = $row->time_in_2;
	$time_out_2 = $row->time_out_2;
	$customer_3 = $row->customer_3;
	$purpose_3 = $row->purpose_3;
	$time_in_3 = $row->time_in_3;
	$time_out_3 = $row->time_out_3;
	$customer_4 = $row->customer_4;
	$purpose_4 = $row->purpose_4;
	$time_in_4 = $row->time_in_4;
	$time_out_4 = $row->time_out_4;
}

if ($time_in_1 == "00:00:00") {
	$time_in_1 = "";
} else {
	$time_in_1 = date('h:i A',strtotime($time_in_1));
}

if ($time_out_1 == "00:00:00") {
	$time_out_1 = "";
} else {
	$time_out_1 = date('h:i A',strtotime($time_out_1));
}

if ($time_in_2 == "00:00:00") {
	$time_in_2 = "";
} else {
	$time_in_2 = date('h:i A',strtotime($time_in_2));
}

if ($time_out_2 == "00:00:00") {
	$time_out_2 = "";
} else {
	$time_out_2 = date('h:i A',strtotime($time_out_2));
}


if ($time_in_3 == "00:00:00") {
	$time_in_3 = "";
} else {
	$time_in_3 = date('h:i A',strtotime($time_in_3));
}

if ($time_out_3 == "00:00:00") {
	$time_out_3 = "";
} else {
	$time_out_3 = date('h:i A',strtotime($time_out_3));
}


if ($time_in_4 == "00:00:00") {
	$time_in_4 = "";
} else {
	$time_in_4 = date('h:i A',strtotime($time_in_4));
}

if ($time_out_4 == "00:00:00") {
	$time_out_4 = "";
} else {
	$time_out_4 = date('h:i A',strtotime($time_out_4));
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
$this->Myfpdf->Cell(195,5,'Dispatch ID: '. $id,0,1,'R');

$this->Myfpdf->SetFont('Times','B',9);
$this->Myfpdf->Cell(30,5,'Pre-Sales Technical',1,0,'');
$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(165,5,utf8_decode($assigned_sales),1,1,'');

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Location',1,0,'');
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

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(97.5,5,'Client Name',0,0,'C');
$this->Myfpdf->Cell(24.375,5,'Purpose',0,0,'C');
$this->Myfpdf->Cell(24.375,5,'Time In',0,0,'C');
$this->Myfpdf->Cell(24.375,5,'Time Out',0,0,'C');
$this->Myfpdf->Cell(24.375,5,'Signature',0,1,'C');

$this->Myfpdf->SetFont('Times','',11);

// ---------------First Segment

	// ---------------Customer 1
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($customer_1) > 95) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(97.5,5,utf8_decode($customer_1),1,0,'');
	$tempFontSize = $fontSize;

	// ---------------End of Customer 1


	// ------------------Purpose 1
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($purpose_1) > 22) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(24.375,5,utf8_decode($purpose_1),1,0,'');
	$tempFontSize = $fontSize;
	$this->Myfpdf->SetFontSize($fontSize);
	//------------------End of Purpose 1

	$this->Myfpdf->Cell(24.375,5,$time_in_1,1,0,'');
	$this->Myfpdf->Cell(24.375,5,$time_out_1,1,0,'');
	$this->Myfpdf->Cell(24.375,5,'',1,0,'');

//---------------End of First Segment

$this->Myfpdf->ln(7);

//---------------Second Segment

	// ---------------Customer 2
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($customer_2) > 95) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(97.5,5,$customer_2,1,0,'');
	$tempFontSize = $fontSize;
	// ---------------End of Customer 2

	// ------------------Purpose 2
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($purpose_2) > 22) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(24.375,5,$purpose_2,1,0,'');
	$tempFontSize = $fontSize;
	$this->Myfpdf->SetFontSize($fontSize);
	//------------------End of Purpose 2
	
	$this->Myfpdf->Cell(24.375,5,$time_in_2,1,0,'');
	$this->Myfpdf->Cell(24.375,5,$time_out_2,1,0,'');
	$this->Myfpdf->Cell(24.375,5,'',1,0,'');
//---------------End of Second Segment

$this->Myfpdf->ln(7);

//---------------Third Segment

	// ---------------Customer 3
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($customer_3) > 95) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(97.5,5,$customer_3,1,0,'');
	$tempFontSize = $fontSize;
	// ---------------End of Customer 3

	// ------------------Purpose 3
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($purpose_3) > 22) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(24.375,5,$purpose_3,1,0,'');
	$tempFontSize = $fontSize;
	$this->Myfpdf->SetFontSize($fontSize);
	//------------------End of Purpose 3

	$this->Myfpdf->Cell(24.375,5,$time_in_3,1,0,'');
	$this->Myfpdf->Cell(24.375,5,$time_out_3,1,0,'');
	$this->Myfpdf->Cell(24.375,5,'',1,0,'');
//-----------------END of Third Segment

$this->Myfpdf->ln(7);

//----------Fourth Segment

	// ---------------Customer 4
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($customer_4) > 95) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(97.5,5,$customer_4,1,0,'');
	$tempFontSize = $fontSize;
	// ---------------End of Customer 4

	// ------------------Purpose 4
	$fontSize = 11;
	$tempFontSize = $fontSize;
	while ($this->Myfpdf->GetStringWidth($purpose_4) > 22) {
		$this->Myfpdf->SetFontSize($tempFontSize -= 0.1);
	}
	$this->Myfpdf->Cell(24.375,5,$purpose_4,1,0,'');
	$tempFontSize = $fontSize;
	$this->Myfpdf->SetFontSize($fontSize);
	//------------------End of Purpose 4

	$this->Myfpdf->Cell(24.375,5,$time_in_4,1,0,'');
	$this->Myfpdf->Cell(24.375,5,$time_out_4,1,0,'');
	$this->Myfpdf->Cell(24.375,5,'',1,0,'');
//------------End of Fourth Segment

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(195,5,'',0,1,'');

$this->Myfpdf->ln(6);
$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(30,5,'Dispatch Date',1,0,'');
$this->Myfpdf->Cell(60,5,date('l - F d, Y',strtotime($dispatch_date)),1,1,'');

$this->Myfpdf->SetFont('Times','B',11);

$this->Myfpdf->Cell(30,5,'Dispatch Time',1,0,'');
$this->Myfpdf->Cell(60,5,date('h:i A',strtotime($dispatch_time)),1,0,'');

$this->Myfpdf->SetFont('Times','',11);

$this->Myfpdf->ln(9);

$this->Myfpdf->SetFont('Times','B',11);
$this->Myfpdf->Cell(48.75,5,'Customer Acceptance:',0,0,'');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'         Dispatched By:',0,0,'');

$this->Myfpdf->ln(9);

$this->Myfpdf->Cell(48.75,5,'________________________________',0,0,'');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->SetFont('Times','U',11);
$this->Myfpdf->Cell(48.75,5,'Arlyn R. Canaway',0,0,'C');

$this->Myfpdf->ln(4);

$this->Myfpdf->SetFont('Times','',11);
$this->Myfpdf->Cell(48.75,5,'Customer Signature over Printed Name',0,0,'');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'',0,0,'C');
$this->Myfpdf->Cell(48.75,5,'HRAD Assistant',0,0,'C');

$this->Myfpdf->Output();
?>