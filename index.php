<?php

include_once('./dsv.php');

if($_GET['demo'] != '')
  {
	DelimiterSeparatedValues('./dsv_files/example'.$_GET['demo'].'.dsv','var_dump');
  }
else
  {
	$directory = @scandir('./dsv_files/');
	$content = '<h1>DelimiterSeparatedValues();</h1><h2>Examples: </h2><br>'."\n";
	foreach($directory as $file)
	  {
		if(($file!='.')&&($file!='..'))
		  {
			$example = @explode("example", $file);
			$example = @explode(".dsv", $example[1]);
			if($example[0] != "")
			  {
				$content .= './<a href="./?demo='.$example[0].'">'.$file.'</a><br>'."\n";
			  }
		  }
	  }
	if(strlen($content) > 16)
	  {
		echo $content;
		echo "\n \n \n".'<br>try one of the examples';
	  }
  }


?>