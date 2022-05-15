<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index-style.css">
    <title>ROCNIKOVA PRACA</title>
</head>
<body>
<div class="navigation">
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"></ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
    <ul>
        <li class="list">
            <a href="index.php?stranka=domov">
                <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Domov</span>
            </a>
        </li>
        <li class="list">
            <a href="index.php?stranka=kontakt">
                <span class="icon">
                <ion-icon name="call-outline"></ion-icon>
                </span>
                <span class="title">Kontakt</span>
            </a>
        </li>
        <li class="list">
            <a href="index.php?stranka=prihlasenie">
                <span class="icon">
                <ion-icon name="log-in-outline"></ion-icon>
                </span>
                <span class="title">Prihlasenie</span>
            </a>
        </li>
        <li class="list">
            <a href="index.php?stranka=registracia">
                <span class="icon">
                <ion-icon name="log-in-outline"></ion-icon>
                </span>
                <span class="title">Registracia</span>
            </a>
        </li>
    </ul>
</div>
<div class="Logo"><span><u><</u> COD3 <u>></u></span> BLOG</div>

<?php
    //presmerovanie v prípade pokusu o prístup na index.php
    if(!$_GET['stranka']){
        header('Location: index.php?stranka=domov');
    }
    //priradenie podstránky do premennej adresa po kliknutí na podstránku
    if(isset($_GET['stranka'])){
            $adresa = $_GET['stranka'];
    }
    else{ 
        $adresa = 'domov.php';
    }
    //presmerovanie na podstránku
    if(preg_match('/^[a-z0-9]+$/',$adresa)){
        $premen = include('odhlaseny/'.$_GET['stranka'].'.php');
        if(!$premen){
            echo "podstranka nenajdena";
        }
    }
?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation')
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active')
        navigation.classList.toggle('active')
    }

    let list = document.querySelectorAll('.list');
    for(let i = 0; i < list.length; i++){
        list[i].onclick = function(){
        let j = 0;
        while(j < list.length){
            list[j++].className = 'list';
        }
        list[i].className = 'list active';
      }
  }
</script>
</body>
</html>