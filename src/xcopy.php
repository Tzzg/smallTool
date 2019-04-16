<?php


   
	
	    $file = fopen("d:/Live-History/20190416/live.txt", "r");
		
		
		$dest = "d:/Live-History/20190416";
	    if(!$file){
			exit("no file \n");
		};
	    while(!feof($file)){
	        $values = array();
	        $one = fgets($file);
		   
		   //D:\svn\niushop_b2b2c_1.11\version.php
		   $one_arr = explode(':',$one);
		   
		   $tem = $dest.end($one_arr);
		   
		   @mkdir(dirname($tem), 0777, true);
		   
		   echo $tem."\n";
		   
		   
		   $one = trim($one);
		   $tem = trim($tem);
		   $one = str_replace("\/","\\",$one);
		   
		    if(copy($one,$tem)){

					echo 'scuuess'."\n";

			 }else{

					echo 'failed'."\n";

			 }
		   
	    }
	    fclose($file);
	
	



?>