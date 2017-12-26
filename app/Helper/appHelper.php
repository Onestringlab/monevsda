<?php

function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
   }
   return 'Rp. '.number_format($number, 0, '.', '.');
}

function selectForm($arrayList,$fieldid,$field,$name,$select){
	$dropdown = "<select class=\"form-control\" id=\"".$name."\" name=\"".$name."\"".fieldRequired('Pilih '. ucfirst($name)).">\n";
	$dropdown .= "<option value=\"\"></option>\n";
	foreach($arrayList as $row):
		$selected = "";
		if($select==$row[$fieldid]){
			$selected =" selected";
		}
		$dropdown .= "<option value=\"".$row[$fieldid]."\"".$selected.">".$row[$field]."</option>\n";
	endforeach;
	$dropdown .="</select>\n";
	return $dropdown;
}

function fieldRequired($customMessage)
{
	$required = 'required autofocus oninvalid="this.setCustomValidity(\''.$customMessage.'\')" oninput="setCustomValidity(\'\')"';
	return $required;
}
