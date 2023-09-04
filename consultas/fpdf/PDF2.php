<?php

require('./fpdf.php');
require_once '../../utils/functions.php';

protect_route();
$resultadoDatos='';
$resultadoDatos=$_SESSION['resultpdf'];

$fpdf = new FPDF();
$fpdf -> AddPage('PORTRAIT','letter');

//IMAGEN(ruta,posicionx, posiciony, alto,ancho,tipo,link)


class pdf extends FPDF
{
   public $resultadoDatos;
   public $nombre;
   public $RFC;
   public $numEmp;
   public $curp;
   public $sexo;
   public $direccion;
   public $telCasa;
   public $telOfi;
   public $email;
   public $nacion;
   public $lugar;
   public $edoCivil;
   public $nombreConyuge;
   public $fotoDir;
   public $foto;
   public $fotoPDF;

   public function setData(array $data)
   {
      $this->resultadoDatos = $data;
      $this->nombre = $this->resultadoDatos['NOMBRE'];
      $this->numEmp = removeZero($this->resultadoDatos['NUMEMP']);
      $this->curp = $this->resultadoDatos['CURP'];
      $this->sexo = $this->resultadoDatos['C_SEXO'];
      $this->telCasa = removeZero($this->resultadoDatos['TELCASA']);
      $this->telOfi = removeZero($this->resultadoDatos['TELOFI']);
      $this->email = $this->resultadoDatos['EMAIL'];
      $this->nacion = $this->resultadoDatos['NACIONALIDAD'];
      $this->lugar = $this->resultadoDatos['LUGAR'];
      $this->edoCivil = $this->resultadoDatos['ESTADO'];
      $this->nombreConyuge = $this->resultadoDatos['CONYUGE'];
      $this->fotoDir = getPhotoDir($this->resultadoDatos['FOTO']);
      $this->foto = __DIR__ . "../../../fotosdb/{$this->fotoDir}.jpg";
      $this->fotoPDF = "no-profile.jpg";
      //  var_dump($this->resultadoDatos);
      //  exit;
   }
	public function header()
	{
        $this->SetFont('Helvetica','B',25);
		$this->Image('ESIME_logo.png',15,5,40,40,'png');
		$this->Image('IPN_logo.png',170,7,30,40,'png');
        $this->Cell(0,40,'Datos del Empleado',0,0,'C');
        $this->Ln();
        $this->Ln();
	}
	public function footer()
	{
      $tz = 'America/Mexico_City';
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone($tz)); 
		$dt->setTimestamp($timestamp); 

        $this->SetFont('Helvetica','B',12);
		$this->SetY(-15);
		$this->Write(5,'SICAH. Derechos Reservados. ');
		$this->SetY(-15);
		$this->SetX(153);
        $this->Write(5 , "CDMX a");
		$this->SetX(170); 	
        $this->Write(5 , ($dt->format('d/m/Y')));
	}
}

$fpdf = new pdf();
$fpdf->setData($resultadoDatos);
$fpdf -> AddPage('PORTRAIT','letter');
$fpdf->SetFont('Helvetica','B',13);
$fpdf->Cell(60,10,utf8_decode(''),0,0);
$fpdf->Cell(0,10,utf8_decode("Número de Empleado {$fpdf->numEmp} "),0,0);
$fpdf->Ln();
$fpdf->Cell(60,10,utf8_decode(''),0,0);
$fpdf->Cell(0,10,"Nombre:  {$fpdf->nombre} ",0,0);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(60,10,utf8_decode(''),0,0);
$fpdf->Cell(0,10,"CURP:{$fpdf->curp} ",0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,utf8_decode(''),0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,"Sexo: {$fpdf->sexo} ",0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,"Estado Civil: {$fpdf->edoCivil} ",0,0);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(0,10,utf8_decode("Télefono de casa: {$fpdf->telCasa}"),0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,utf8_decode("Télefono celular: {$fpdf->telOfi}"),0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,"E-mail: {$fpdf->email} ",0,0);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(0,10,utf8_decode("Nombre del cónyuge: {$fpdf->nombreConyuge}"),0,0);
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Cell(0,10,"Nacionalidad {$fpdf->nacion}",0,0);
$fpdf->Ln();
$fpdf->Cell(0,10,"Lugar de Nacimiento: {$fpdf->lugar}",0,0);
$fpdf->foto = __DIR__ . "../../../fotosdb/{$fpdf->fotoDir}.jpg";
$fpdf->fotoPDF = "no-profile.jpg";
if (file_exists($fpdf->foto)) {
   $fpdf->fotoPDF= $fpdf->foto;
 }
 $fpdf->Image( $fpdf->fotoPDF,20,60,30,30,'jpg');
$fpdf->Image('SICAH_marca_agua.png',10,50,200,200,'png');

//Linea horizonrtal sup
$fpdf->SetDrawColor(128,0,64);
$fpdf->SetLineWidth(0.8);
$fpdf->Line(5,5,210,5);

//Linea horizontal inf
$fpdf->Line(5,275,210,275);

//Linea vertical derecha
$fpdf->Line(210,5,210,275);

//Linea vertical izquierda
$fpdf->Line(5,5,5,275);

//Linea Datos empleado
$fpdf->SetDrawColor(0,0,0);
$fpdf->SetLineWidth(0.3);
$fpdf->Line(65,35,152,35);
$fpdf->Line(65,37,152,37);

//Linea footer
$fpdf->SetDrawColor(0,0,0);
$fpdf->SetLineWidth(0.3);
$fpdf->Line(10,260,205,260);

$fpdf->OutPut(); 