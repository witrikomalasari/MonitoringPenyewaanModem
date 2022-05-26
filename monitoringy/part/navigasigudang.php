 
        <ul >    
   
            <?php 
                include '../connection/koneksi.php'; 
                include 'librarygudang.php';

            $cm = new clibrary();
            
            $cek = $cm->cekstok();                                                   
            //echo $cek['total'];
            $nilai=mysqli_fetch_assoc($cek);
            
            if (($nilai['total'])>0){?>
               <li> <?php echo $nilai['total']?>ALERT </li>

            <?php
            }
            ?>
            <hr>
            <li> <a href="indexgudang.php?page=dashboardgudang.php"> Dashboard </a> </li> 
            <hr>

            <li> <a href="indexgudang.php?page=bahanbaku.php"> Bahan Baku </a> </li> 
            <hr>

             <li class="dropdown">  Transaksi    
                &nbsp &nbsp <a href="#" class="caret"> </a>
                    <ul class="dropdownmasterdata" style="font-size: 14px;text-align: right;">
                        
                        <br>   
                        <li> <a href="indexgudang.php?page=barang_masuk.php"> Barang Masuk </a> </li>   
                        <br>                                             
                        <br>   
                        <li> <a href="indexgudang.php?page=barang_keluar.php"> Barang Keluar </a> </li>
                        
                    </ul>
                    <br>
            </li>
            <hr>

            
            <li> <a href="indexgudang.php?page=siapkirim.php"> STATUS PENGIRIMAN  </a> </li>  
            <hr>   
            
           
           
        </ul>       
        
  
