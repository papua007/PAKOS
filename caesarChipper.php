<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="caesar_chipper.css">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="welcomePage">
            <div class="overlay"></div>
            <h1>Encrypt-Verter</h1>
            <h4>Rahasiakan Pesanmu dengan Sekali Klik!</h4>
            <a href="#mainPage">Mulai</a>
        </div>
        <div class="mainPage" id="mainPage">
            <div class="encryptSection">
                <h1>Enkripsi</h1>
                <p>Enkripsi adalah proses teknis yang mengonversikan informasi menjadi kode rahasia, sehingga
                    mengaburkan
                    data yang Anda kirim, terima, atau simpan.</p>
                <form action="" method="post">

                    <input type="number" name="encodeKey" id="encodeKey" placeholder="Masukkan Key" />
    
                    <input type="text" name="encodeString" id="encodeString" placeholder="Ketik Pesan Anda" />
    
                    <button type="submit" name="enkripsi" id="submitEncode">Submit</button>
                </form>
                <?php 
                if (isset($_POST['enkripsi'])) {
                    $string = $_POST['encodeString'];
                    $key = $_POST['encodeKey'];
                    
                ?><p class="output" id="outputEncode"><?php Enkripsi($string, $key); ?></p>
                <?php
                }else {
                    ?><p class="output" id="outputEncode"></p><?php
                }
                ?>

            </div>
            <div class="decryptSection">
                <h1>Dekripsi</h1>
                <p>Enkripsi adalah proses teknis yang mengonversikan informasi menjadi kode rahasia, sehingga
                    mengaburkan
                    data yang Anda kirim, terima, atau simpan.</p>
                <form action="" method="post">

                    <input type="number" name="decodeKey" id="decodeKey" placeholder="Masukkan Key" />
    
                    <input type="text" name="decodeString" id="decodeString" placeholder="Ketik Pesan Anda" />
    
                    <button type="submit" name="dekripsi" id="submitDecode">Submit</button>
                </form>
                <?php 
                if (isset($_POST['dekripsi'])) {
                    $string = $_POST['decodeString'];
                    $key = $_POST['decodeKey'];
                    
                    
                ?><p class="output" id="outputEncode"><?php Dekripsi($string, -1* $key); ?></p>
                <?php
                }else {
                    ?><p class="output" id="outputEncode"></p><?php
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <p>Copyright by Kelompok 3</p>
        </div>
    </div>
</body>

</html>

<!-- Function -->
<?php
function Caesar_cipher($huruf, $key)
{
  // periksa inputan, harus alphabet
  $huruf = ctype_alpha($huruf)? $huruf : die('Inputan salah!');

  //ubah inputan kedalam uppercase
  $huruf = strtoupper($huruf);

  // periksa nomor ascii nya
  $ascii = ord($huruf);

  // tambahkan key nya / geser ke nomor ascii yang baru
  $ascii_baru = $ascii + $key;

  // periksa jika nomor ascii sudah sampai alphabet terakhir
  // kembalikan ke alphabet awal
  $ascii_baru = $ascii_baru > 90 ? $ascii_baru - 26 : $ascii_baru;
  $ascii_baru = $ascii_baru < 65 ? $ascii_baru + 26 : $ascii_baru;

  // tampilkan huruf baru yang sudah digeser
  $huruf_baru = chr($ascii_baru);
  
 	echo $huruf_baru;
      

}

function Enkripsi($input, $key)
{
	$output = "";

  // pisahkan kalimat inputan menjadi huruf dalam array
	$inputArr = str_split($input);

  // looping inputan
	foreach ($inputArr as $huruf){
    // masukan hasil enkripsi kedalam variabel output
    $output .= Caesar_cipher($huruf, $key);
  }

  // kembalian
	return $output;
}

function Dekripsi($input, $key)
{
  // lakukan Enkripsi dengan inputan keynya menjadi negatif
    $output = "";

  // pisahkan kalimat inputan menjadi huruf dalam array
	$inputArr = str_split($input);

  // looping inputan
	foreach ($inputArr as $huruf){
    // masukan hasil enkripsi kedalam variabel output
    $output .= Caesar_cipher($huruf, $key);
  }

  // kembalian
	return $output;
}


?>