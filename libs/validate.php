<?php
function detectkosong($value){
	$temp = trim($value);
	return !isset($value) || empty($value) || empty($temp);
}
// $errorusername = '';
// $errorpassword = '';
// $errornama = '';

function validatename(&$errors,&$namaerror,$field_list,$field_name)
{
	$pattern = "/^[a-zA-Z-' ]{1,}+$/"; // huruf dan min 1 char
	if (detectkosong($field_list[$field_name])){
		$errors[$field_name] = 'required' ;
		$namaerror = 'required';
		return false;
	}
	else if (!preg_match($pattern, $field_list[$field_name])){
		$errors[$field_name] = 'input harus berupa huruf saja';
		$namaerror = 'input harus berupa huruf saja';
		return false;
	}

	return true;

}

function validatenum(&$errors,&$errormsg,$post,$namainput){
	$regxnum =  "/^[\d]{10,13}$/"; // angka
	if (detectkosong($post[$namainput])){
		$errors[$namainput] = 'required';
		$errormsg = 'required';
		return false;
	}
	else if (!preg_match($regxnum,$post[$namainput])){
		$errors[$namainput] = 'Inputan Harus Berupa Angka';
		$errormsg = 'Inputan Harus Berupa Angka';
		return false;
	}
	else{
		return true;
	}
}
function validatealnum(&$errors,&$errormsge,$post,$namainput){
	$regxalnum = "/^[a-zA-Z]+[0-9]+$/"; // alnum
	if (detectkosong($post[$namainput])){
		$errors[$namainput] = "required";
		$errormsge = "required";
		return false;
	}
	elseif (!preg_match($regxalnum,$post[$namainput])) {
		$errors[$namainput] = "Inputan Harus Berupa Huruf dan Angka";
		$errormsge = "Inputan Harus Berupa Huruf dan Angka";
		return false;
	}
	else{
		return true;
	}
}

function validateemail(&$errors,&$errormsg,$method,$namainput){
	$regexemail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	$db = new PDO("mysql:host=localhost;dbname=store",'root','');
	$allemail = $db->prepare("SELECT customer_email from customers" );
	$allemail->execute();
	$resultemail = $allemail->fetchAll(PDO::FETCH_ASSOC);
	foreach($resultemail as $i){
		if ($i['customer_email'] == $method[$namainput]){
			$errors[$namainput] = 'Email telah terdaftar, Gunakan Email Lain';
        	$errormsg = 'Email telah terdaftar, Gunakan Email Lain';
		}
	}
	if (detectkosong($method[$namainput])){
        $errors[$namainput] = 'Wajib Diisi';
        $errormsg = 'Wajib Diisi';
    }
	elseif (preg_match('/\s/',$method[$namainput])){
		$errors[$namainput] = 'Dilarang Mengandung Spasi';
        $errormsg = 'Dilarang Mengandung Spasi';
	}
	elseif(!preg_match($regexemail,$method[$namainput])){
		$errors[$namainput] = 'Format email salah';
        $errormsg = 'Format email salah';
	}
}

function validasiusername(&$errors,&$errormsg,$method,$namainput){ // Wajib || Harus alphabet || alnum || minimal ada 1 huruf | minimal ada 1 angka
    $db = new PDO("mysql:host=localhost;dbname=store",'root','');
	$allusername = $db->prepare("SELECT username from customers" );
	$allusername->execute();
	$resultallusername = $allusername->fetchAll(PDO::FETCH_ASSOC);
	foreach($resultallusername as $i){
		if ($i['username'] == $method[$namainput]){
			$errors[$namainput] = 'Username telah terdaftar, Gunakan Username Lain';
        	$errormsg = 'Username telah terdaftar, Gunakan Username Lain';
		}
	}
	if (detectkosong($method[$namainput])){
        $errors[$namainput] = 'Wajib Diisi';
        $errormsg = 'Wajib Diisi';
    }
	elseif(preg_match('/[!@#$%^&*()_+\-={}|:"<>?;\'\\\[\],.\/]/',$_POST[$namainput])){
		$errors[$namainput] = 'Dilarang Ada Char Khusus';
        $errormsg = 'Dilarang Ada Char Khusus';
	}
	elseif (preg_match('/\s/',$method[$namainput])){
		$errors[$namainput] = 'Dilarang Mengandung Spasi';
        $errormsg = 'Dilarang Mengandung Spasi';
	}
	elseif (strlen($method[$namainput])>255){
		$errors[$namainput] = 'Username terlalu panjang';
        $errormsg = 'Username terlalu panjang';
	}
    elseif (validatealnum($errors,$errormsg,$method,$namainput)){

    }
	
}
function validatepassword(&$errors,&$errormsg,$method,$namainput){ // Wajib || Min 1 Huruf Besar || Min 
	if (detectkosong($method[$namainput])){
		$errors[$namainput] = 'Wajib Diisi';
        $errormsg = 'Wajib Diisi';
	}
	elseif (strlen($method[$namainput])< 8 || strlen($method[$namainput])>16){
		$errors[$namainput] = 'Panjang password 8 hingga 16 karakter';
        $errormsg = 'Panjang password 8 hingga 16 karakter';
	}
	elseif (!preg_match('/[A-Z]/',$method[$namainput])){
		$errors[$namainput] = 'Minimal ada 1 huruf Besar';
        $errormsg = 'Minimal ada 1 huruf Besar';
	}
	elseif (!preg_match('/[a-z]/',$method[$namainput])){
		$errors[$namainput] = 'Minimal Harus ada 1 huruf kecil';
        $errormsg = 'Minimal Harus ada 1 huruf kecil';
	}
	elseif (!preg_match('/\W/',$method[$namainput])){
		$errors[$namainput] = 'Minimal Harus ada 1 Char Spesial';
        $errormsg = 'Minimal Harus ada 1 Char Spesial';
	}
	elseif (preg_match('/\s/',$method[$namainput])){
		$errors[$namainput] = 'Dilarang Mengandung Spasi';
        $errormsg = 'Dilarang Mengandung Spasi';
	}
}


error_reporting(E_ALL);

?>
