<?php
session_start();
if(isset($_GET['odhlasit'])){
    session_destroy();      // <- ukončenie session
    //presmerovanie
    header('Location: ../index.php?stranka=prihlasenie');
}
//if(isset($_SESSION['uzivatel_meno']))
//ochrana pred vratenim sipkou spat
if(isset($_SESSION['uzivatel_meno']) == ''){
    session_destroy();      // <- ukončenie session
    //presmerovanie
    header('Location: ../index.php?stranka=prihlasenie');
}

if(isset($_SESSION)){
    // echo"Administrácia";
?>
<?php
    }else{
        echo"<p>Nie ste prihlaseny</p>";
    }
?>

<div class="main">
    <?php echo $_SESSION['uzivatel_meno']; ?> <br>
    <?php echo $_SESSION['uzivatel_email']; ?>
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
    list[2].className = 'list';
    list[3].className = 'list';
    list[4].className = 'list active';
    list[5].className = 'list';
</script>