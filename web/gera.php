<?php

//RECEBE PAR�METRO  
$id = $_GET["id"];  
//CONECTA AO MYSQL                                               
$conn = mysqli_connect("localhost", "root", "", "d20"); 

//EXIBE IMAGEM                                                                        
$sql = mysqli_query($conn, "SELECT * FROM tb_arm_dist WHERE id = ".$id."");         
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);    
   //$tipo   = $row["tipo"];                        
   $bytes  = $row["figura"];                        
   //EXIBE IMAGEM                                 
   header("Content-type: image/png");             
   echo $bytes;                                   
?>