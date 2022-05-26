<?php
session_start();
/*
if($_SESSION['username'])
{
    if($_SESSION['divisi'] == "administrator") {header("location:");}
    else
      {
        if($_SESSION['divisi']=="produksi") {header("location:../produksi/indexproduksi.php");}
          elseif ($_SESSION['divisi']=="gudang") {header("location:../gudang/indexgudang.php");}
          elseif ($_SESSION['divisi']=="manager") {header("location:../manager/indexmanager.php");}
      }

}

else
{

    header("location:../index.php");
}

*/



              error_reporting(0);
                 
                 $page=$_GET['page'];   
                 switch($page)
                    {
                        default:
                        include "";
                        break;
                                                        
                        case "username";
                        include "content/username.php";
                        break;

                        case "customer";
                        include "content/customer.php";
                        break;

                        case "produk";
                        include "content/produk.php";
                        break;

                        case "produk2";
                        include "content/detailproduk.php";
                        break;

                        case "stok";
                        include "content/stok.php";
                        break;
                        
                        case "dataorder";
                        include "content/dataorder.php";
                        break;

                        case "laporan_data_order";
                        include "content/laporandataorder.php";
                        break;

                        case "laporan_data_produksi";
                        include "content/laporandataproduksi.php";
                        break;
                       
                    
                    }


            ?>

<!DOCTYPE html>

<html>
	<head>
		<title> ADMINISTRATOR </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/CSS" href="../asset/style2.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/styleform.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/reset200802.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/font-awesome-4.7.0/css/font-awesome.min.css" >  


	</head>
	<body>
		<div id="header"> <?php include'../part/header.php'; ?>  </div>
		<div id="icon"> <?php include'../part/icon.php';?> </div>
		<div id="navigasi"> <?php include'../part/navigasi.php';?> </div>
		<div id="content"> <?php include  "content/$page";?>  </div>
		<div id="footer"> <?php include'../part/footer.php';?> </div>

<style type="text/css">
            @import "../asset/media/css/demo_table_jui.css";
            @import "../asset/media/themes/sunny/jquery-ui.css";
</style>      
<script src="../asset/jquery-3.2.1.min.js"></script>
<script src="../asset/media/js/jquery.js"></script>
<script src="../asset/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $('#datatables,#datatables2').dataTable({
                      "oLanguage": {
                              "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                              "sSearch": "Pencarian: ", 
                              "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
                              "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                              "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                              "sInfoFiltered": "(di filter dari _MAX_ total data)",
                              "oPaginate": {
                                  "sFirst": "<<",
                                  "sLast": ">>", 
                                  "sPrevious": "<", 
                                  "sNext": ">"
                           }
                         },

                          "sPaginationType":"full_numbers",
                        "bJQueryUI":true
                   });            
          }); 


</script>

 <script type="text/javascript">
            $(document).ready(function() {
                $(".caret").click(function(){
                    $(".dropdownmasterdata").fadeToggle();
                  });
                });              
</script>
       

<script type="text/javascript">
            $(document).ready(function() {
                $(".fa-angle-down").click(function(){
                    $(".dropdown-icon").fadeToggle(500);
                  });
                });              
</script>

</body>
</html>

