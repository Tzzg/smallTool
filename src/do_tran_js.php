<?php



    //根据 all 生成 翻译文件 .js
	
	echo "var LANG = {\n";
	    
	
	    $file = fopen("all.txt", "r");
	    if (!$file)exit('no file'."\n");
	    while(!feof($file)){
	        $values = array();
	        $one = fgets($file);
	        $one = explode("\t", $one);
	        
	       echo "'".trim($one[0])."':".'"'.trim($one[0]).'||'.$one[1].'||'.$one[2].'",'."\n";//all
		   //echo "'".trim($one[0])."':".'"'.trim($one[0])."\n";//zh-cn
		   //echo "'".trim($one[0])."':".'"'.trim($one[1])."\n";//en-us
		   //echo "'".trim($one[0])."':".'"'.trim($one[2])."\n";//de
		  
		  
		   
	    }
	    fclose($file);
	
	
	echo "}; \n";














?>