
<?php

require_once('../fpdf.php');

require '../../logica/conexion.php';
$q = $_REQUEST["id"];

class PDF extends FPDF
{
public $dato="";

// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(40);
    // Título[]
    $this->Cell(100,10,'Num. Orden: '.$this->dato,1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Num. Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$sql = "select orden.*, chofer.RUT as chrut, chofer.NOMBRE as chfr, cliente.NOMBRE as clnt, transporte.MARCA as camMarca, transporte.MODELO as camModel, transporte.ANO as camAno, transporte.N_CHASIS as camChasis, transporte.N_MOTOR as camMotor
, transporte.VENC_CHILE as camVencimientoChile, transporte.VENC_SEGURO as camVenSeguro,seguro.DESCRIPCION as seguro, t2.ID_TIPO_TRANSPORTE as engancheMarca, t2.MODELO as engancheModelo, t2.ANO as engancheAno, t2.PATENTE as enganchePatente, t2.N_CHASIS as engancheChasis, t2.FOLIO_SEGURO as enganchePoliza, t2.VENC_CHILE as engancheVencimientoChile, s2.DESCRIPCION as engancheSeguro from orden left join chofer on orden.RUT_CHOFER=chofer.RUT left join cliente on orden.RUT_CLIENTE=cliente.RUT  LEFT JOIN transporte on orden.PATENTE = transporte.PATENTE LEFT join seguro on seguro.ID = transporte.ID_ASEGURADORA LEFT JOIN transporte t2 on orden.PATENTE_ENGANCHE = t2.PATENTE
LEFT JOIN seguro s2 on transporte.ID_ASEGURADORA = s2.ID where orden.ID=".$q;
$consulta = mysqli_query($conexion, $sql);

if (!$consulta) {
    die('Consulta no válida: ' . mysql_error());
}


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->dato=$q;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);

while (($fila = mysqli_fetch_array($consulta))!=NULL){
//DATOS DE NIHUIL
$pdf->SetTextColor(16,87,97);
$pdf->Cell(28,10, 'DATOS NIHUIL',0,1,'C',0);
$pdf->Line(10,37,200,37);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,6, 'Razon Social',0,0,'A',0);
$pdf->Cell(130,6, 'Transporte Nihuil Limitada',0,1,'C',0);
$pdf->Cell(60,6, 'CUIT',0,0,'A',0);
$pdf->Cell(130,6, '76.119.920-k',0,1,'C',0);
$pdf->Cell(60,6, 'Direccion Fiscal',0,0,'A',0);
$pdf->Cell(130,6, 'Avenida cinco 4300 block Q',0,1,'C',0);
$pdf->Cell(60,6, 'PAUIT',0,0,'A',0);
$pdf->Cell(130,6, '51720',0,1,'C',0);

//SALTO DE LINEA
$pdf->Ln(5);
//DATOS DEL CLIENTE
$pdf->SetTextColor(16,87,97);
//$pdf->SetFillColor(11,63,71);
$pdf->Cell(30,6, 'DATOS CLIENTE',0,1,'C',0);
$pdf->Line(10,74,200,74);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,6, 'Nombre',0,0,'A',0);
$pdf->Cell(130,6,$fila['clnt'],0,1,'C',0);
$pdf->Cell(60,6, 'RUT',0,0,'A',0);
$pdf->Cell(130,6,$fila['RUT_CLIENTE'],0,1,'C',0);

//SALTO DE LINEA
$pdf->Ln(5);
//DATOS DEL CONDUCTOR
$pdf->SetTextColor(16,87,97);
$pdf->Cell(38,6, 'DATOS CONDUCTOR',0,1,'C',0);
$pdf->Line(10,97,200,97);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,6, 'Nombre',0,0,'A',0);
$pdf->Cell(130,6,$fila['chfr'],0,1,'C',0);
$pdf->Cell(60,6, 'RUT',0,0,'A',0);
$pdf->Cell(130,6,$fila['chrut'],0,1,'C',0);

//SALTO DE LINEA
$pdf->Ln(5);
//DATOS DEL TRANSPORTE
$pdf->SetTextColor(16,87,97);
$pdf->Cell(38,6, 'DATOS TRANSPORTE',0,1,'C',0);
$pdf->Line(10,120,200,120);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,6, 'Marca',0,0,'A',0);
$pdf->Cell(130,6,$fila['camMarca'],0,1,'C',0);
$pdf->Cell(60,6, 'Modelo',0,0,'A',0);
$pdf->Cell(130,6,$fila['camModel'],0,1,'C',0);
$pdf->Cell(60,6,'Año' ,0,0,'A',0);
$pdf->Cell(130,6,$fila['camAno'],0,1,'C',0);
$pdf->Cell(60,6, 'Patente',0,0,'A',0);
$pdf->Cell(130,6,$fila['PATENTE'],0,1,'C',0);
$pdf->Cell(60,6, 'Chasis',0,0,'A',0);
$pdf->Cell(130,6,$fila['camChasis'],0,1,'C',0);
$pdf->Cell(60,6, 'Motor',0,0,'A',0);
$pdf->Cell(130,6,$fila['camMotor'],0,1,'C',0);
$pdf->Cell(60,6, 'Seguro',0,0,'A',0);
$pdf->Cell(130,6,$fila['seguro'],0,1,'C',0);
$pdf->Cell(60,6, 'Vencimiento Seguro',0,0,'A',0);
$pdf->Cell(130,6,$fila['camVenSeguro'],0,1,'C',0);
$pdf->Cell(60,6, 'Resolucion',0,0,'A',0);
$pdf->Cell(130,6,'',0,1,'C',0);
$pdf->Cell(60,6, 'Vencimiento Permiso Chile',0,0,'A',0);
$pdf->Cell(130,6,$fila['camVencimientoChile'],0,1,'C',0);

//SALTO DE LINEA
$pdf->Ln(5);
//DATOS DEL ENGANCHE
$pdf->SetTextColor(16,87,97);
$pdf->Cell(35,6, 'DATOS ENGANCHE',0,1,'C',0);
$pdf->Line(10,191,200,191);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,6, 'Marca',0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheMarca'],0,1,'C',0);
$pdf->Cell(60,6, 'Modelo',0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheModelo'],0,1,'C',0);
$pdf->Cell(60,6,'Año' ,0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheAno'],0,1,'C',0);
$pdf->Cell(60,6, 'Patente',0,0,'A',0);
$pdf->Cell(130,6,$fila['enganchePatente'],0,1,'C',0);
$pdf->Cell(60,6, 'Chasis',0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheChasis'],0,1,'C',0);
$pdf->Cell(60,6, 'Poliza',0,0,'A',0);
$pdf->Cell(130,6,$fila['enganchePoliza'],0,1,'C',0);
$pdf->Cell(60,6, 'Seguro',0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheSeguro'],0,1,'C',0);
$pdf->Cell(60,6, 'Vencimiento Seguro',0,0,'A',0);
$pdf->Cell(130,6,$fila['camVenSeguro'],0,1,'C',0);
$pdf->Cell(60,6, 'Resolucion',0,0,'A',0);
$pdf->Cell(130,6,'',0,1,'C',0);
$pdf->Cell(60,6, 'Vencimiento Permiso Chile',0,0,'A',0);
$pdf->Cell(130,6,$fila['engancheVencimientoChile'],0,1,'C',0);



}
mysqli_close($conexion);


$pdf->Output();
 ?>
