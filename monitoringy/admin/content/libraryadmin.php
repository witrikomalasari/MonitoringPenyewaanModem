<?php 

class clibrary
{

	private $c;
	

	public function getbahanbaku() 
	{
       include '../connection/koneksi.php';


      $sql="SELECT A.kdbarang 
             FROM  bahan_baku A
             ORDER BY kdbarang LIMIT 10";

        $rs=$con->query($sql);
		return $rs;

	}

	
}



?> 