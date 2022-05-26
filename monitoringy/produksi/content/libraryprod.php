<?php 

class clibrary
{ 

	private $c;
	private $insert;
	 
	  
	
	public function cekstok($jml)
	{	include '../connection/koneksi.php';
	
		//$sql= "select * from pinjam where no_pinjam='$_GET[no_pinjam]'";
		$sql = "select count(*)total 
		        from bahan_baku A
				where A.stokbahanbaku <'".$jml."'";
		
		 $rs=$con->query($sql);
		return $rs;
	} 


	public function caribahanbaku($jml)
	{	include '../connection/koneksi.php';	
		//$sql= "select * from pinjam where no_pinjam='$_GET[no_pinjam]'";
		$sql = "select A.namabarang,A.stokbahanbaku 
		        from bahan_baku A
				where A.stokbahanbaku<'".$jml."'";
		
		 $rs=$con->query($sql);
	    
		return $rs;
	}

	public function getlist($idprod)
	{
       include '../connection/koneksi.php';

      $sql="SELECT A.kdbarang, A.namabarang,A.stokbahanbaku 
             FROM  bahan_baku A,produkdetail B
             where a.kdbarang=b.kdbarang
             and   b.idproduk='".$idprod."'";
        //$c=new cconnection();
             $rs=$con->query($sql);
		return $rs;

	}
	
	public function carinoprod()
	{
      include '../connection/koneksi.php';

      $sql="SELECT A.noproduksi,SUBSTR(A.noproduksi,16,3),SUBSTR(A.noproduksi,16,3)+1 NOMOR
            FROM PRODUKSI A
            WHERE date_format(A.tglmulaiproduksi,'%D-%M-%Y')=date_format(NOW(),'%D-%M-%Y')
            ORDER BY A.noproduksi DESC 
            LIMIT 1";    
	  $rs=$con->query($sql); 
	  return $rs;
	}
	
	public function getTglpinjam($tglmulaiproduksi){
		 include '../connection/koneksi.php';
		 
		$tgl = explode('-', $tglmulaiproduksi);
		return $this->tglmulaiproduksi = $tgl[2].'.'.$tgl[1].'.'.$tgl[0];
	}

public function getbaku($idprod)
	{	
		include '../connection/koneksi.php';	
		$sql="SELECT 
					A.*,
					B.kdbarang
		       from 
		       		produkdetail A,
		       		bahan_baku B 
			   where 
			   		A.kdbarang=B.kdbarang		   		
			  		and A.idproduk='".$idprod."' 
			   order by B.kdbarang";

	  $rs=$con->query($sql); 
	  return $rs;
	}
    
	
	
	public function insertdt($noproduksi,$kdbarang,$jumlahproduksi)
	{
		include '../connection/koneksi.php';
		$insert=false;
		
		 $sql="INSERT INTO produksi_dt
		            (noproduksi,kdbarang,jumlahproduksi)
			       values
				      ('".$noproduksi."','".$kdbarang."','".$jumlahproduksi."')";
		
		 
		//$query=mysqli_query($sql) or die (mysqli_error());  syntax mysqli tidak dipakai
		if ($con->query($sql)==true)
		//if ($query)
		{
			$insert = true;
		}
		return $insert;
		
	}
	
	public function updatestok($kdbarang,$jumlahproduksi)
	{
		include '../connection/koneksi.php';	
		$insert=false;
		
		$sql="UPDATE bahan_baku a
		      set 
		         a.stokbahanbaku=a.stokbahanbaku-'".$jumlahproduksi."'
		         
		      where a.kdbarang = '".$kdbarang."'";
		
		//$query=mysqli_query($sql) or die (mysqli_error());
		if ($con->query($sql)==true)
		{
			$insert = true;
		}
		//$rs->closeconnection();
		return $insert;
	}
}
?>