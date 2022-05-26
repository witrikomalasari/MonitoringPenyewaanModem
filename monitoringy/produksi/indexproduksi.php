<?php
session_start();
/*
if($_SESSION['username'])
{
    if($_SESSION['divisi'] == "produksi") {header("location:");}
    else
      {
        if($_SESSION['divisi']=="administrator") {header("location:../admin/indexadmin.php");}
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
                        include "dashboardproduksi.php";
                        break;
                                                        
                        case "request_produksi";
                        include "content/requestproduksi.php";
                        break;

                        case "status_produksi";
                        include "content/produksi.php";
                        break;

                        case "laporan_data_produksi";
                        include "content/laporandataproduksi.php";
                        break;
                       
                    }
            ?>

<!DOCTYPE html>

<html>
	<head>
		<title> PRODUKSI </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/CSS" href="../asset/style2.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/styleform.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/reset200802.css">
		<link rel="stylesheet" type="text/CSS" href="../asset/font-awesome-4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="../asset/css/style.css" type="text/css" />
    <script src="../asset/jquery-3.2.1.min.js"></script>
    <script src="../asset/media/js/jquery.js"></script>
    <script src="../asset/media/js/jquery.dataTables.js"></script>
        
	</head>

	<body>
		<div id="header"> <?php include'../part/header.php'; ?>  </div>
		<div id="icon"> <?php include'../part/icon.php';?> </div>
		<div id="navigasi"> <?php include'../part/navigasiproduksi.php';?> </div>
		<div id="content"> <?php include  "content/$page";?>  </div>
		<div id="footer"> <?php include'../part/footer.php';?> </div>







<style type="text/css">
            @import "../asset/media/css/demo_table_jui.css";
            @import "../asset/media/themes/sunny/jquery-ui.css";
        </style>      

<script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $('#datatables').dataTable({
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
          })    
</script>



<script type="text/javascript">
            $(document).ready(function() {
                $(".fa-angle-down").click(function(){
                    $(".dropdown-icon").fadeToggle(500);
                  });
                });              
</script>

<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("Btn");
    x.disabled = true;
}
</script>

	</body>
</html>

