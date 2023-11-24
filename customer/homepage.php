<?php
    session_start();

    if (isset($_SESSION['custid'])){

?>
<a href="profile.php">PROFIL</a>
<a href="keranjang.php">Keranjang</a>
<a href="allorder.php">ORDER</a>
<html>
    <form action="homepage.php" method="GET">
        <label for="inputkatakunci">CARI : </label>
        <input type="text" name="inputkatakunci" id="inputkatakunci" value="<?php if(isset($_GET['search'])){echo $_GET['inputkatakunci'];}?>">
        <input type="submit" name="search" id="search">
    </form>
</html>

<?php
    
    var_dump($_SESSION['custid']) ;
    
    $db = new PDO('mysql:host=localhost;dbname=store','root','');
    global $errorjum;
    $errorjum = '';
    if (isset($_GET['search'])){
        $katakunci = $_GET['inputkatakunci'];
    }
    else{
    $katakunci = "";}

    $semuaproduk = $db->prepare("SELECT * from plants where plant_name LIKE '%$katakunci%'");
    $semuaproduk->execute();
    $listproduk = $semuaproduk->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($listproduk as $produk){
        echo "<form action='tambahkeranjang.php' method='GET'";
        echo "<span>{$produk['plant_id']}</span><br>";
        echo "<span>{$produk['plant_name']}</span><br>";
        echo "<span>{$produk['plant_price']}</span><br>";
        echo "{$produk['plant_photo']}";

        echo "<br><input type='hidden' name='idprdct' id='idprdct' value='{$produk['plant_id']}'> " ;
        echo "<input type='text' name='jumlah' id='jumlah' value='1'><span>";
        echo $errorjum;
        echo "</span>" ;
        echo "<input type='submit' name='tambah' id='tambah' value='+ Ke Keranjang'></form>" ;
        
    }
    // echo $_GET['jumlah'];
}
else{
    header("Location: ../login.php");
}
?>