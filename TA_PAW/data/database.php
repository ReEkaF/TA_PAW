<?php 
require_once("config/setup.php");

function getallplantcategoties() {
    try{
        $state= DB->query("SELECT * FROM categories");
        $state-> execute();
        return $state->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $err) {
        echo $err->getMessage();
    }
}
function getDataCategory($category_id) 
{
	try{
		$statement = DB->prepare("SELECT * FROM categories WHERE category_id = :category_id");
		$statement->bindValue(':category_id',$category_id);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}

function getCountplantByCategory($category_id) 
{
	try{
		$statement = DB->prepare("SELECT COUNT(*) AS jumlah_produk FROM plant WHERE category_id = :category_id");
		$statement->bindValue(':category_id',$category_id);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}
function insertCategory($data)
{ 
    $kode = $data["kode"];
	$kategori = $data["kategori"];
	try{
		$statement = DB->prepare("INSERT INTO categories VALUES(:kode,:kategori)");
		$statement->bindValue(':kode',$kode);
		$statement->bindValue(':kategori',$kategori);
		$statement->execute();
		header("location:manajemen_kategori.php");
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}

function editCategory($data){
	$kodeKat = $data["kodeKat"];
	$namaKat = $data["namaKat"];
	try{
		$statement = DB->prepare("UPDATE categories SET category_name= :namaKat WHERE category_id= :kodeKat");
		$statement->bindValue(':namaKat',$namaKat);
		$statement->bindValue(':kodeKat',$kodeKat);
		$statement->execute();
		header("location:manajemen_kategori.php");
	}
	catch(PDOException $err){
		echo "Update data kategori gagal";
		echo $err->getMessage();
	}
}

function deleteCategory($kodeKat){
	try{
		$statement = DB->prepare("DELETE FROM categories WHERE category_id = :kodeKat");
		$statement->bindValue(':kodeKat',$kodeKat);
		$statement->execute();
		header("location:manajemen_kategori.php");
	}
	catch(PDOException $err){
		echo "Delete data kategori gagal";
		echo $err->getMessage();
	}
}


///// ======================== plant MODEL ======================== /////
function getAllDataplant() 
{
	try{
		$statement = DB->prepare("SELECT * FROM plant");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}
function getAllDataplantWithDetails() 
{
	try{
		$statement = DB->prepare("SELECT * FROM plants JOIN categories ON categories.category_id = plants.category_id");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}
function getAllDataplantWithDetailsByCategory($kodeKat) 
{
	try{
		$statement = DB->prepare("SELECT * FROM plant JOIN categories ON categories.category_id = plant.category_id WHERE plant.category_id = :kodeKat");
		$statement->bindValue(':kodeKat',$kodeKat);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}

function getDataplantByCategory($category_id) 
{
	try{
		$statement = DB->prepare("SELECT * FROM plant JOIN categories ON plant.category_id=categories.category_id WHERE categories.category_id = :category_id");
		$statement->bindValue(':category_id',$category_id);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}

function getDataPlant($plant_id) 
{
	try{
		$statement = DB->prepare("SELECT * FROM plant where plant_id = :plant_id");
		$statement->bindValue(':plant_id',$plant_id);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $err){
		echo $err->getMessage();
	}
}

// function insertProduct($data)
// {
// 	// ambil data file
// 	$namaFile = $data[1]['gambar']['name'];
// 	$namaSementara = $data[1]['gambar']['tmp_name'];

// 	// tentukan lokasi file akan dipindahkan
// 	// $direktori = DATABASE_PATH."\assets\images\plant";
// 	$direktori = DATABASE_PATH."/assets/images/plant/";


// 	// Pengecekan tipe file
// 	$allowedTypes = array("image/jpeg", "image/jpg", "image/png"); // Tipe file yang diizinkan
// 	if (!in_array($data[1]['gambar']['type'], $allowedTypes)) {
// 		echo "Tipe file tidak diizinkan. Hanya gambar JPEG, JPG, PNG yang diizinkan.";
// 	}

// 	// Pengecekan ukuran file
// 	$maxSize = 5 * 1024 * 1024; // Maksimal ukuran file 5 MB
// 	if ($data[1]['gambar']['size'] > $maxSize) {
// 		echo "Ukuran file terlalu besar. Maksimal ukuran file adalah 5 MB.";
// 	}

// 	// Ubah nama file
// 	$namaFileBaru = $data[0]["plant_id"] . '_' . $namaFile; // Membuat nama unik dengan fungsi uniqid

// 	// Pindahkan file jika tipe dan ukuran sesuai
// 	if (move_uploaded_file($namaSementara, $direktori.$namaFileBaru)) {
// 		echo "Gambar berhasil diunggah";
// 	} else {
// 		echo "Terjadi kesalahan saat mengunggah gambar.";
// 	}

//     $kodePro=$data[0]["plant_id"];
// 	$kodeKat=$data[0]["category_id"];
// 	$namaPro=$data[0]["plant_name"];
// 	$gambarPro=$namaFileBaru;
// 	$hargaPro=$data[0]["hargaProduk"];
// 	$stokPro=$data[0]["stokProduk"];

// 	try{
// 		$statement = DB->prepare("INSERT INTO plant(plant_id, category_id, plant_name, gambarProduk, hargaProduk, stokProduk) VALUES (:kodePro, :kodeKat, :namaPro, :gambarPro, :hargaPro, :stokPro)");
// 		$statement->bindValue(':kodePro',$kodePro);
// 		$statement->bindValue(':kodeKat',$kodeKat);
// 		$statement->bindValue(':namaPro',$namaPro);
// 		$statement->bindValue(':gambarPro',$gambarPro);
// 		$statement->bindValue(':hargaPro',$hargaPro);
// 		$statement->bindValue(':stokPro',$stokPro);
// 		$statement->execute();
// 		header("location:".FOLDER_PATH."/app/admin/manajemen_produk.php");
// 	}
// 	catch(PDOException $err){
// 		echo "Insert data produk gagal";
// 		echo $err->getMessage();
// 	}
// }

// function editProduct($data)
// {
// 	if (empty($data[1]['gambar']['name'])) {
// 		$namaFileBaru = $data[0]["gambar_lama"];
// 	} else {
// 		// ambil data file
// 		$namaFile = $data[1]['gambar']['name'];
// 		$namaSementara = $data[1]['gambar']['tmp_name'];

// 		// tentukan lokasi file akan dipindahkan
// 		// $direktori = DATABASE_PATH."\assets\images\plant";
// 		$direktori = DATABASE_PATH."/assets/images/plant/";


// 		// Pengecekan tipe file
// 		$allowedTypes = array("image/jpeg", "image/jpg", "image/png"); // Tipe file yang diizinkan
// 		if (!in_array($data[1]['gambar']['type'], $allowedTypes)) {
// 			echo "Tipe file tidak diizinkan. Hanya gambar JPEG, JPG, PNG yang diizinkan.";
// 		}

// 		// Pengecekan ukuran file
// 		$maxSize = 5 * 1024 * 1024; // Maksimal ukuran file 5 MB
// 		if ($data[1]['gambar']['size'] > $maxSize) {
// 			echo "Ukuran file terlalu besar. Maksimal ukuran file adalah 5 MB.";
// 		}

// 		// Ubah nama file
// 		$namaFileBaru = $data[0]["plant_id"] . '_' . $namaFile; // Membuat nama unik dengan fungsi uniqid

// 		// Pindahkan file jika tipe dan ukuran sesuai
// 		if (move_uploaded_file($namaSementara, $direktori.$namaFileBaru)) {
// 			echo "Gambar berhasil diunggah";
// 		} else {
// 			echo "Terjadi kesalahan saat mengunggah gambar.";
// 		}
// 	}

//     $kodePro=$data[0]["plant_id"];
// 	$kodeKat=$data[0]["category_id"];
// 	$namaPro=$data[0]["plant_name"];
// 	$gambarPro=$namaFileBaru;
// 	$hargaPro=$data[0]["hargaProduk"];
// 	$stokPro=$data[0]["stokProduk"];

// 	try{
// 		$statement = DB->prepare("UPDATE plant set plant_id = :kodePro, category_id = :kodeKat, plant_name =  :namaPro, gambarProduk = :gambarPro, hargaProduk=:hargaPro, stokProduk=:stokPro where plant_id = :kodePro");
// 		$statement->bindValue(':kodePro',$kodePro);
// 		$statement->bindValue(':kodeKat',$kodeKat);
// 		$statement->bindValue(':namaPro',$namaPro);
// 		$statement->bindValue(':gambarPro',$gambarPro);
// 		$statement->bindValue(':hargaPro',$hargaPro);
// 		$statement->bindValue(':stokPro',$stokPro);
// 		$statement->execute();
// 		header("location:".FOLDER_PATH."/app/admin/manajemen_produk.php");
// 	}
// 	catch(PDOException $err){
// 		echo "Update data produk gagal";
// 		echo $err->getMessage();
// 	}

// }

// function deleteProduct($kodePro){
// 	try{
// 		$statement = DB->prepare("DELETE FROM plant WHERE plant_id = :kodePro");
// 		$statement->bindValue(':kodePro',$kodePro);
// 		$statement->execute();
// 		header("location:".FOLDER_PATH."/app/admin/manajemen_produk.php");
// 	}
// 	catch(PDOException $err){
// 		echo "Delete data produk gagal";
// 		echo $err->getMessage();
// 	}
// }

// //---------------------------------------------------------------------------------------------------------------------------//
// ///// ======================== CARTS MODEL ======================== /////
// function getCartCode($kodePelanggan) 
// {
// 	try{
// 		$statement = DB->prepare("SELECT kodeKeranjang FROM carts WHERE kodePelanggan = :kodePelanggan");
// 		$statement->bindValue(':kodePelanggan',$kodePelanggan);
// 		$statement->execute();
// 		return $statement->fetch(PDO::FETCH_ASSOC);
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}

// }
// function insertCart($kodePelanggan,$plant_id) 
// {
// 	$kodeKeranjang = getCartCode($kodePelanggan);
// 	try{
// 		$statement = DB->prepare("INSERT INTO cartdetails(kodeKeranjang,plant_id) VALUES(:kodeKeranjang,:plant_id)");
// 		$statement->bindValue(':kodeKeranjang',$kodeKeranjang['kodeKeranjang']);
// 		$statement->bindValue(':plant_id',$plant_id);
// 		$statement->execute();

// 		$previousPage = $_SERVER['HTTP_REFERER'];
// 		header("Location: $previousPage");
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }
// function getAllplantInCarts($kodePelanggan) 
// {
// 	try{
// 		$statement = DB->prepare("SELECT cartdetails.plant_id, plant_name,gambarProduk, categories.category_name, hargaProduk, COUNT(*) AS jumlah_item FROM cartdetails JOIN carts ON cartdetails.kodeKeranjang = carts.kodeKeranjang JOIN plant ON cartdetails.plant_id = plant.plant_id JOIN categories ON plant.category_id=categories.category_id where carts.kodePelanggan=:kodePelanggan GROUP BY cartdetails.plant_id");
// 		$statement->bindValue(':kodePelanggan',$kodePelanggan);
// 		$statement->execute();
// 		return $statement->fetchAll(PDO::FETCH_ASSOC);
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }
// function reduceProductInCart($kodePelanggan,$plant_id) 
// {
// 	$kodeKeranjang = getCartCode($kodePelanggan);
// 	try{
// 		$statement = DB->prepare("DELETE FROM cartdetails WHERE kodeKeranjang=:kodeKeranjang AND plant_id=:plant_id ORDER BY kodeDetilKeranjang DESC LIMIT 1");
// 		$statement->bindValue(':kodeKeranjang',$kodeKeranjang['kodeKeranjang']);
// 		$statement->bindValue(':plant_id',$plant_id);
// 		$statement->execute();

// 		$previousPage = $_SERVER['HTTP_REFERER'];
// 		header("Location: $previousPage");
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }
// function increaseProductInCart($kodePelanggan,$plant_id) 
// {
// 	$kodeKeranjang = getCartCode($kodePelanggan);
// 	try{
// 		$statement = DB->prepare("INSERT INTO  cartdetails(kodeKeranjang,plant_id) VALUES (:kodeKeranjang,:plant_id)");
// 		$statement->bindValue(':kodeKeranjang',$kodeKeranjang['kodeKeranjang']);
// 		$statement->bindValue(':plant_id',$plant_id);
// 		$statement->execute();

// 		$previousPage = $_SERVER['HTTP_REFERER'];
// 		header("Location: $previousPage");
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }



// ///// ======================== ORDERS MODEL ======================== /////
// function order($kodePelanggan)
// {
// 	try{
// 		$plant = getAllplantInCarts($kodePelanggan);
// 		$total=0;
// 		foreach ($plant as $product) {
// 			$total += $product["hargaProduk"] * $product["jumlah_item"];
// 		}
// 		$orderInsertStm = DB->prepare("INSERT INTO orders(kodePelanggan,total) VALUES (:kodePelanggan,:total)");
// 		$orderInsertStm->bindValue(':kodePelanggan',$kodePelanggan);
// 		$orderInsertStm->bindValue(':total',$total);
// 		$orderInsertStm->execute();

// 		$lastInsertIdOrder = DB->LastInsertId();
// 		foreach ($plant as $product) {
// 			$plant_id=$product["plant_id"];
// 			$hargaProduk = $product["hargaProduk"];
// 			$jumlah_item=$product["jumlah_item"];
// 			$orderDetailInsertStm=DB->prepare("INSERT INTO orderdetails(kodePesanan,plant_id,hargaProduk,qty) VALUES (:kodePesanan,:plant_id,:hargaProduk,:jumlah_item)");
// 			$orderDetailInsertStm->bindValue(':kodePesanan',$lastInsertIdOrder);
// 			$orderDetailInsertStm->bindValue(':plant_id',$plant_id);
// 			$orderDetailInsertStm->bindValue(':hargaProduk',$hargaProduk);
// 			$orderDetailInsertStm->bindValue(':jumlah_item',$jumlah_item);
// 			$orderDetailInsertStm->execute();
// 		}
		
// 		$kodeKeranjang = getCartCode($kodePelanggan);

// 		$deleteCartDetails=DB->prepare("DELETE FROM cartdetails WHERE kodeKeranjang=:kodeKeranjang");
// 		$deleteCartDetails->bindValue(':kodeKeranjang',$kodeKeranjang['kodeKeranjang']);
// 		$deleteCartDetails->execute();

// 		header("location:".FOLDER_PATH."/app/pengguna/daftar_pesanan.php");
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }

// function getAllOrder($kodePelanggan)
// {
// 	try{
// 		$statement = DB->prepare("SELECT * FROM orders WHERE kodePelanggan=:kodePelanggan ORDER BY tanggalPesan DESC");
// 		$statement->bindValue(':kodePelanggan',$kodePelanggan);
// 		$statement->execute();
// 		return $statement->fetchAll(PDO::FETCH_ASSOC);
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }
// function getOrderDetails($kodePesanan)
// {
// 	try{
// 		$statement = DB->prepare("SELECT * FROM orderdetails JOIN plant ON orderdetails.plant_id = plant.plant_id WHERE kodePesanan=:kodePesanan");
// 		$statement->bindValue(':kodePesanan',$kodePesanan);
// 		$statement->execute();
// 		return $statement->fetchAll(PDO::FETCH_OBJ);
// 	}
// 	catch(PDOException $err){
// 		echo $err->getMessage();
// 	}
// }
// ?>

// ?>