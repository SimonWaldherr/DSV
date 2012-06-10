<?php

function DelimiterSeparatedValues($file, $export='xml', $save='output', $csv=false)
  {
    //echo $file."\n".$export."\n".$save."\n".$csv;
    $handle = @fopen($file, 'r');
    if ($handle) 
      {
        //echo 'test: '.fgets($handle, 4096)."\n";
        
        $line = fgets($handle, 4096);
        $linelength = strlen($line);
        $i = 1;
        $setdelimiter = true;
        while(($setdelimiter == true)&&($i < $linelength/2-2))
          {
	        $linearray[0] = str_split($line, $i);
	        if($linearray[0][0]==$linearray[0][1])
	          {
	            $delimiter = $linearray[0][0];
	            $setdelimiter = false;
	          }
	        else
	          {
	            
	          }
          }
        
        $linearray[0] = explode($delimiter, $line);
        
        $i = 1;
        //var_dump($linearray);
        while ($i < $linearray[0][3])
          {
	        $buffer = fgets($handle, 4096);
	        //echo $i.'. HEAD: '.$buffer;
	        ++$i;
          }
        
        while (($buffer = fgets($handle, 4096)) !== false)
          {
	        include('./plugins/'.$export.'/generate.php');
            
            //echo $buffer;
            //echo "\n";
          }
        if (!feof($handle))
          {
            echo 'ERROR 0: unexpected error\n every error is unexpected, but this error is the most unexpected.\n This error occurs on invalid files, not on invalid contained content.';
          }
        else
          {
	        include('./plugins/'.$export.'/export.php');
          }
        fclose($handle);
      }
    else
      {
	    echo 'ERROR 1: couldn\'t open file';
      }
  }

?>