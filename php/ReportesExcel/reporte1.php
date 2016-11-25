<?php

require('fpdf/fpdf.php');
require('conexion.php');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border

		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','',20);
	$this->Image('icono.gif' , 10,10, 40 , 40,'GIF');
	$this->Text(50,30,'Lista de Alumnos Registrados en el sistema',0,'C', 0);
	$this->Ln(40);
}

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'boleta',0,0,'L');


}

}

//	$paciente= $_GET['id'];
	$con = new DB;
	$pacientes = $con->conectar();

	$strConsulta = "SELECT num_control,Nombre,Apellidos from alumno ";

	$pacientes = mysql_query($strConsulta);

	$fila = mysql_fetch_array($pacientes,MYSQL_BOTH);

	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,22,39);

	$pdf->Ln(30);

/*
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'num_control: '.$fila['num_control'],0,1);
	$pdf->Cell(0,6,'Nombre: '.$fila['Nombre'].' ',0,1);
  $pdf->Cell(0,6,'Apellidos: '.$fila['Apellidos'].' ',0,1);
*/

	$pdf->Ln(10);

	$pdf->SetWidths(array(65, 60, 55, 50, 20));
	$pdf->SetFont('Arial','',15);

    $pdf->SetFillColor(063,136,143);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('NumControl', 'Nombre', 'Apellidos'));

			}

	$historial = $con->conectar();
	$strConsulta = "SELECT num_control,Nombre,Apellidos from alumno ";


	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);

	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			$pdf->SetFont('Arial','',15);
			   $pdf->Cell(1,0,'',0,1);



			if($i%2 == 1)
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['num_control'], $fila['Nombre'],$fila['Apellidos']));
			}
			else
			{
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['num_control'], $fila['Nombre'],$fila['Apellidos']));
			}
		}

$pdf->Output();
?>
