<?php


function set($str){
	
	$unistr =	"{:lang(".$str[0].")}";	
	
	return $unistr;
}

function each_do($dir,$out){

	$list = scandir($dir);
	//var_dump($list);
	foreach($list as $val){
		$o_val = $out.'/'.$val;
		$f_val = $dir.'/'.$val;
		
		if(is_file($f_val)){//文件
			//var_dump($val);exit;
			echo $f_val.' is deal '."\n";	
			
			if ( (! $file = fopen($f_val, "r")) ||(! $fp = @fopen($o_val, 'ab')))
			{
				continue;
			}
			flock($fp, 2);
			while(!feof($file)){
			   
				$one = fgets($file);
				
				//$one = "管理员用户不可进行操作,额我";
				//$pattern="[\u4e00-\u9fa5]+";//#中文正则表达式
				$content = preg_replace_callback('#(?:(?![，。？])[\xC0-\xFF][\x80-\xBF]+)+#','set',$one);//$content是需要处理的字符串
				//var_dump($content);exit;
			   //echo "'".trim($one[3])."'=>".'"'.trim($one[3]).'||'.$one[1].'||'.$one[2].'",'."\n";
			   //$tem = trim($one[3]);
			  // echo "'{$tem}'=>'<i title=\"{$tem}||{$one[1]}||{$one[2]}\">{$tem}</i>',"."\n";
			  //echo $content;
			
				fwrite($fp, $content);
			   
			}
			flock($fp, 3);
			fclose($fp);
			fclose($file);  
			
		}else{
			
			if(!in_array($val,['.','..'])){
				file_exists($o_val) or mkdir ($o_val,0777,true);
				echo $f_val.' is dir'."\n";
				each_do($f_val,$o_val);	
			}
			//目录
		}
	}

	unset($list);
}

ini_set("memory_limit", "10240M");	
$dir = 'cn';
$out = 'en';
//把目录下所以的文件里的中文用{：lang()}替换
each_do($dir,$out);








?>