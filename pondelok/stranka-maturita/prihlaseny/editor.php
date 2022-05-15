<div class="main">
<?php 
require("../funkcie/url_create.php");
require("../databaza.php");
session_start(); 

//ochrana pred vratenim sipkou spat
if(isset($_SESSION['uzivatel_meno']) == ''){
  session_destroy();
  header('Location: prihlasenie.php');
}
//privitanie uzivatela na zaklade jeho mena
echo "<h1>".$_SESSION['uzivatel_meno'].", Vitaj v editore clankov</h1>"; 
require('../databaza.php');     //vyziadanie databazy
if($_POST){     //v pripade stlacenie tlacitka publikovat clanok sa udeje vsetko v tele tejto podmienky
    $nazov = $_POST['title'];     //priradenie nazvu do premennej
    $obsah = $_POST['obsah'];     //priradenie textu - obsahu do premennej
    $url = createUrlSlug($nazov); //vytvorenie url adresy
    $url = $url.'-'.time();       //pridanie casu do url adresy aby sa nemohla nikdy opakovat
    $popis = $_POST['popis'];     //priradenie popisu do premennej
    $uziv_id = $_SESSION['uzivatel_id'];    //priradenie pouzivatelovho id do premennej
    //pridanie clanku do databazy
    $sqli = "INSERT INTO clanky (title, content, url_article, subscribe, id_user) VALUES ('$nazov', '$obsah', '$url', '$popis', '$uziv_id')";
    $conn->query($sqli);
    //evidovanie posledneho clanku
    $posledny = $conn->insert_id;
    $_SESSION['posl_clanok'] = $posledny;
}
?>

<form action="" method="post">
  <div class="value-holder">
    <div class="icon-holder">
    <ion-icon name="reader-outline"></ion-icon>
    </div>
    <input type="text" placeholder="Titulok" name="title"> <br>
  </div>
  <div class="value-holder">
    <div class="icon-holder">
    <ion-icon name="chatbox-ellipses-outline"></ion-icon>
    </div>
    <input type="text" placeholder="Krátky popis" name="popis"> <br>
  </div>
  <textarea name="obsah" id="texty" cols="30" rows="10"></textarea><br />
  <input type="submit" name="submit" value='Pridat clanok'>
</form>
</div>

<script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation')
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active')
        navigation.classList.toggle('active')
    }
    let list = document.querySelectorAll('.list');

    list[0].className = 'list';
    list[1].className = 'list';
    list[2].className = 'list active';
    list[3].className = 'list';
    list[4].className = 'list';
    list[5].className = 'list';
</script>