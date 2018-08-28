<?php
require_once 'config.php';

				$q=$_GET['q1'];
				$q1=$_GET['q2'];
				$q2=$_GET['q3'];
				$q3=$_GET['q4'];
				$q4=$_GET['q5'];
				$q5=$_GET['q6'];
				

							
				if($q!=""){
				$quer1=mysql_query("SELECT DISTINCT c_1_id,name FROM c_level_1 where catalog_c_1_id=$q  AND obsolete=0 ORDER BY c_1_id");
					if($noticia1 = mysql_fetch_array($quer1)){
					echo "<option value='1'>Select a Subcategory</option>";
					echo "<option value='$noticia1[c_1_id]'>$noticia1[name]</option>";
					
					while($noticia1 = mysql_fetch_array($quer1)) {
										echo "<option value='$noticia1[c_1_id]'>$noticia1[name]</option>";
									}
					}
				}
				elseif($q1!=""){
				
				$quer2=mysql_query("SELECT DISTINCT c_2_id,name FROM c_level_2 where c_1_id=$q1  AND obsolete=0 ORDER BY c_2_id");
				
					if($noticia2 = mysql_fetch_array($quer2)){
					echo "<option value='1'>Select a Subcategory</option>";
					echo "<option value='$noticia2[c_2_id]'>$noticia2[name]</option>";
					while($noticia2 = mysql_fetch_array($quer2)) {
										
										echo "<option value='$noticia2[c_2_id]'>$noticia2[name]</option>";
									}
					}
				}
				elseif($q2!=""){
				$quer3=mysql_query("SELECT DISTINCT c_3_id,name FROM c_level_3 where c_2_id=$q2  AND obsolete=0 ORDER BY c_3_id");
					if($noticia3 = mysql_fetch_array($quer3)){
					echo "<option value='1'>Select a Subcategory</option>";
					echo "<option value='$noticia3[c_3_id]'>$noticia3[name]</option>";
					while($noticia3 = mysql_fetch_array($quer3)) {
										echo "<option value='$noticia3[c_3_id]'>$noticia3[name]</option>";
									}
								}
					}
				elseif($q3!=""){
				$quer4=mysql_query("SELECT DISTINCT c_4_id,name FROM c_level_4 where c_3_id=$q3  AND obsolete=0 ORDER BY c_4_id");
					if($noticia4 = mysql_fetch_array($quer4)){
					echo "<option value='1'>Select a Subcategory</option>";
					echo "<option value='$noticia4[c_4_id]'>$noticia4[name]</option>";
					while($noticia4 = mysql_fetch_array($quer4)) {
										echo "<option value='$noticia4[c_4_id]'>$noticia4[name]</option>";
									}
								}
				}
				elseif($q4!=""){
				$quer5=mysql_query("SELECT DISTINCT c_5_id,name FROM c_level_5 where c_4_id=$q4  AND obsolete=0 ORDER BY c_5_id");
					if($noticia5 = mysql_fetch_array($quer5)){
					echo "<option value='1'>Select a Subcategory</option>";
					echo "<option value='$noticia5[c_5_id]'>$noticia5[name]</option>";
					while($noticia5 = mysql_fetch_array($quer5)) {
										echo "<option value='$noticia5[c_5_id]'>$noticia5[name]</option>";
									}
								}
				}
				elseif($q5!=""){
				$quer6=mysql_query("SELECT DISTINCT format_id,name FROM format where format_type_id=$q5 ORDER BY format_id");
					if($noticia6 = mysql_fetch_array($quer6)){
					echo "<option value='1'>Select a format</option>";
					echo "<option value='$noticia6[format_id]'>$noticia6[name]</option>";
					while($noticia6 = mysql_fetch_array($quer6)) {
					echo "<option value='$noticia6[format_id]'>$noticia6[name]</option>";
								}
							}
				}
	
?>