
<?php
include '../connection/koneksi.php';

// memanggil library FPDF
require('../asset/pdf/fpdf.php');


// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',16);
// mencetak string 
$pdf->Image('../gambar/logo.jpg',6,1,66,29);
$pdf->SetX(4);   
$pdf->Cell(280,7,'PT SOLUSI MEDIA SEMESTA',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetX(7);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(7);
$pdf->MultiCell(180,7,'Telpon : 0038XXXXXXX',0,'L');   
$pdf->SetX(7);
$pdf->MultiCell(180,7,' GD CYBER 2 KUNINGAN 
JAKARTA SELATAN',0,'L');
$pdf->SetX(7);
$pdf->MultiCell(300,7,'website : www.sms.com 
	email : sms@gmail.com',0,'L');


$pdf->SetFont('Arial','B',14);
$pdf->Cell(280,5,'LAPORAN DATA ORDER',0,1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->ln(1);
$pdf->Cell(0,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1); 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(8,6, 'NO', 1, 0, 'C');
$pdf->Cell(45,6,'No Purchase Order',1,0, 'C');
$pdf->Cell(27,6,'Tanggal PO',1,0, 'C');
$pdf->Cell(60,6,'Nama Pelanggan',1,0, 'C');
$pdf->Cell(30,6,'Nama Produk',1,0, 'C');
$pdf->Cell(30,6,'Jumlah Produk',1,0, 'C');
$pdf->Cell(30,6,'statusprod',1,1, 'C');
 
$pdf->SetFont('Arial','B',10);
$no=1;

$sql="SELECT 
										 
										 tb_datapesan.nopo,
										 tb_datapesan.tglorder,
										 tb_customer.namacustomer,
										 tb_namaproduk.namaproduk, 
										 tb_datapesan.jumlahproduk,
										 produksi.statusprod
									   FROM 	 
									   	 tb_customer,
								  		 tb_namaproduk, 	  		  
								  		 tb_datapesan,
								  		 produksi

								  	   WHERE 
								  	   		 produksi.nopo
								  	   	AND	 tb_datapesan.nopo=produksi.nopo
								  	   	AND  tb_customer.kdcustomer=tb_datapesan.kdcustomer
								  	   	AND  tb_namaproduk.idproduk=tb_datapesan.idproduk 
								  	   		 produksi.statusprod ='done'

							  		  	ORDER BY tb_datapesan.tglorder asc";


							  		  	 


$pdf->Cell(10,7,'',0,1);
$rs=$con->query($sql);

while ($row = mysqli_fetch_array($rs)){
	$pdf->Cell(8,6, $no , 1, 0, 'C');
    $pdf->Cell(45,6,$row['nopo'],1,0, 'C');
    $pdf->Cell(27,6,$row['tglorder'],1,0, 'C');
    $pdf->Cell(60,6,$row['namacustomer'],1,0, 'C'); 
    $pdf->Cell(30,6,$row['namaproduk'],1,0, 'C'); 
    $pdf->Cell(30,6,$row['jumlahproduk'],1,0, 'C'); 
    $pdf->Cell(30,6,$row['statusprod'],1,1, 'C'); 

    $no++;
}
 
$pdf->Output("indexadmin.php?page=laporandataorder.php", "I");
?>
