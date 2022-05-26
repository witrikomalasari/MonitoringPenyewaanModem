<br>
<h1>  Pengelolaan Username dan Password </h1>	
	<hr style="border: 2px outset;">  
 
<div id="containeruser">  
	<div class="formuser">  
		<?php include '../connection/koneksi.php';?>
			
			<form class="userpass" method="POST" action="indexadmin.php?page=insertprocess.php">
				<label>
					<span>NIK </span>
					<br>
					<input placeholder="NIK" name="nik" type="text" required>
				</label>
				<br>
				<label>
					<span>Nama </span>
					<br>
					<input placeholder="nama" name="nama" type="text" required>
				</label>
				<br>
				<label>
					<span>Username </span>
					<br>
					<input type="text" name="username" placeholder="Masukkan Username" required>
				</label>
				<br>
				<label>
					<span>Password </span>
					<br>
				<input type="password" name="password" placeholder="Masukkan Password" required>
				</label>
				<br>
				<label>
					<span>Divisi </span>
					<br>
					<select class="bagian" name="bagian" required>						
								<option value="pilih"> Pilih </option>
								<option value="Admin"> Admin </option>
								<option value="Produksi"> Produksi </option>
								<option value="Gudang"> Gudang </option>
								<option value="Manager"> Manager </option>
					</select>
				</label	>
						<br>
						<input type="submit" value="SUBMIT">
						<input type="reset" value="RESET">			
			</form>
		
		
			<fieldset>
			<h1>USER TERDAFTAR</h1>
			<br> 
			<table id="datatables" class="display">
			  <thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>NAMA</th>
					<th>USERNAME</th>
					<th>PASSWORD</th>
					<th>DIVISI</th>
					<th>ACTION</th>
				</tr>
			   </thead>
			   <tbody>
					<?php
						

						$sql="SELECT *

							  FrOM tb_user";
						$rs=$con->query($sql);
						$no = 1;
						while($row=mysqli_fetch_row($rs)){ 
							 echo 
							 "<tr>
	                           		 <td width=\"10\"> $no </td>

		                            <td>"                             
									?>
										<?php echo $row[1];?>
									</td>
										<td><?php echo $row[2];?></td>
										<td><?php echo $row[3];?></td>
										<td><?php echo $row[4];?></td>
										<td><?php echo $row[5];?></td>	
										
										<td>
											<a href="indexadmin.php?page=formupdate.php&userid=<?php echo$row[0];?>">
											 <i class="fa fa-pencil" style="color:black;font-size:25px;"> </i>
											</a>
											
											<a href="indexadmin.php?page=deleteprocess.php&userid=<?php echo$row[0];?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
												<i class="fa fa-times-circle-o" style="color:red;font-size:25px;"> </i>
											</a>
										
										 <?php "                             
		                           		 </td>
	                            </tr>";
                      $no++;
                    }                    
                    ?>
					
					</tbody>
				  </table>
				</fieldset>

 
			
		</div>			
					
</div>      