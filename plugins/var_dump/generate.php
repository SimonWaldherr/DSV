<?php

$rows = 1;
//@$dsv_export[] = "Value ".$rows++.": ".implode(" Value ".$rows++.": ",explode($delimiter, $buffer))."<br> \n";
$array = explode($delimiter, $buffer);
//var_dump ($array);
$dsv_string = '';
foreach($array as $string)
  {
	//echo "abc";
	@$dsv_string .= ' Value '.$rows++.': '.$string;
  }
$dsv_export[] = 'Line '.@++$dsv_lines.': '.$dsv_string.'<br>';

?>