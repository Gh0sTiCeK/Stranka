<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<div class = "main">
<div class="prihlasenie-place">
<div class="prihlasenie">
    <div class="log-title">
        <span class="icon">
        <ion-icon name="person-outline"></ion-icon>
        </span>
    </div>
    <div class="error">
<?php 
session_start();
require_once("databaza.php"); 
if(isset($_SESSION['uzivatel_id'])){
    header('Location: prihlaseny/prihlaseny.php?stranka=domov');
    exit();
}
if($_POST){
    $meno=$_POST['meno'];       //priradenie hodnot do premenných z formuláru
    $heslo=$_POST['heslo'];     //priradenie hodnot do premenných z formuláru
    //kontrolujeme či bolo zadané meno a heslo
    if($_POST['meno'] == '' || $_POST['heslo'] == ''){

    }else{
        //získavanie údajov z databázy
        $sql="SELECT * FROM uzivatelia WHERE name_user = '$meno' OR email_user = '$meno' LIMIT 1";
        $result = $conn->query($sql);
        //prejdenie údajov v databáze na základe zadaného mena
        while($row = $result->fetch_row()){
            $id_user = $row[0];
            $name = $row[1];
            $email = $row[2];
            $heslo = $row[3];
            $admin = $row[4];
        }
        //overenie správnosti hesla
        if(!password_verify($_POST['heslo'], $heslo)){
            echo '<p> Nespravne meno alebo heslo</p>';
        //priradenie hodnot do session pre neskorsie použitie
        }else{
            $_SESSION['uzivatel_id'] = $id_user;
            $_SESSION['uzivatel_meno'] = $name;
            $_SESSION['uzivatel_admin'] = $admin;
            $_SESSION['uzivatel_email'] = $email;
            //presmerovanie na domovskú stránku po prihlásení
            header('Location: prihlaseny/prihlaseny.php?stranka=domov');
        }
    }
}
?>
</div>
    <form method="post">
        <div class="icon-holder">
            <div class="value-holder">
            <ion-icon name="person"></ion-icon>
            </div>
            <input type="text" placeholder="Meno" name="meno"> <br>
        </div>
        <div class="icon-holder">
            <div class="value-holder">
            <ion-icon name="key"></ion-icon>
            </div>
            <input type="password" placeholder="Heslo" name="heslo"> <br>
        </div>
        <input type="submit" name="submit" value="Prihlásiť sa"> <br>
    </form>

    <div class = "loginText">
        <?php
            echo "Nemáte ešte účet? ";
        ?>
        <a href="../index.php?stranka=registracia">
            <span class="title">Registrovať sa</span>
        </a>
        <?php
            echo ".";
        ?>
    </div>
</div>
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
</script>
