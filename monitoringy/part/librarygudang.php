<?php 

class clibrary
{

	private $c;
	
	
	
	public function cekstok()
	{	include '../connection/koneksi.php';
	
		//$sql= "select * from pinjam where no_pinjam='$_GET[no_pinjam]'";
		$sql = "select count(*)total 
		        from bahan_baku A
				where A.stokbahanbaku <=10";
		
		 $rs=$con->query($sql);
		return $rs;
	}


	
	

}	
?>