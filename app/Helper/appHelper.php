<?php
use App\Penjabat;

function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'Angka') {
        return number_format($number, 0, ',', '.');
   }
   return 'Rp. '.number_format($number, 0, ',', '.').',-';
}

function formatPersen($number)
{
   return number_format($number, 0, ',', '.');
}

function formatTanggal($tanggal)
{
	if($tanggal != null && $tanggal != "" ){
		return date_format(date_create($tanggal),"d-m-Y");
	}
}

function selectForm($arrayList,$fieldid,$field,$name,$select,$required = 'Y',$classcustom=''){
	$dropdown = "<select class=\"form-control ".$classcustom."\" id=\"".$name."\" name=\"".$name."\"";
	if($required == 'Y'){
		$dropdown .= fieldRequired('Harap Dipilih');
	}
	$dropdown .= ">\n";
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
	$required = ' required autofocus oninvalid="this.setCustomValidity(\''.$customMessage.'\')" oninput="setCustomValidity(\'\')"';
	return $required;
}

function selisihHari($tglMulai,$tglSelesai)
{
	return date_create($tglSelesai)->diff(date_create($tglMulai))->format('%a');
}

function persenHari($tglMulai,$tglSelesai){
	return 100/selisihHari($tglMulai,$tglSelesai);
}

function namaPenjabat($nip){
	$nama = Penjabat::select('namapenjabat')->where('nip', $nip)->first();
	return $nama['namapenjabat'];
}
