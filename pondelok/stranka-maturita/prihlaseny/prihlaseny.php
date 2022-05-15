<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../prihlaseny-style.css">
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
            <a href="prihlaseny.php?stranka=domov">
                <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Domov</span>
            </a>
        </li>
        <li class="list">
            <a href="prihlaseny.php?stranka=kontakt">
                <span class="icon">
                <ion-icon name="call-outline"></ion-icon>
                </span>
                <span class="title">Kontakt</span>
            </a>
        </li>
        <li class="list">
            <a href="prihlaseny.php?stranka=editor">
                <span class="icon">
                <ion-icon name="document-text-outline"></ion-icon>
                </span>
                <span class="title">Editor</span>
            </a>
        </li>
        <li class="list">
            <a href="prihlaseny.php?stranka=clanky">
                <span class="icon">
                <ion-icon name="list-outline"></ion-icon>
                </span>
                <span class="title">Clanky</span>
            </a>
        </li>
        <li class="list">
            <a href="prihlaseny.php?stranka=administracia">
                <span class="icon">
                <ion-icon name="grid-outline"></ion-icon>
                </span>
                <span class="title">Administracia</span>
            </a>
        </li>
        <div class="medzera"></div>
        <li class="list">
            <a href="administracia.php?odhlasit">
                <span class="icon">
                <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Odhlasenie</span>
            </a>
        </li>
    </ul>
</div>
<div class="Logo"><span><u><</u> COD3 <u>></u></span> BLOG</div>

<?php
    //presmerovanie v prípade pokusu o prístup na index.php
    if(!$_GET['stranka']){
        header('Location: prihlaseny.php?stranka=domov');
    }
    //priradenie podstránky do premennej adresa po kliknutí na podstránku
    if(isset($_GET['stranka'])){
        $stranka = $_GET['stranka'];

        if(preg_match('/^[a-z0-9]+$/',$stranka)){
            $vlozene = include($stranka.'.php');
            if(!$vlozene)
                header("Location: index.php");
        }
        else
        echo "Neplatný parameter.";
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