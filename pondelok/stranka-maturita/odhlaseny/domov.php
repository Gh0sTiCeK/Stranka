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
<div class = "main">
    <div class = "main-title">
        <?php echo "DOMOV"; ?>
    </div>
    <div class = "description">
        <?php 
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
            qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
            dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco 
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
            qui officia deserunt mollit anim id est laborum."; 
        ?>
    </div>
</div>
<div class = "bg"></div>
<div class = "image1-canvas">
    <div class = "image1-bg">
        <div class = "image1-menu">
            <div class = "image1-logo"></div>
            <div class = "image1-item1"></div>
            <div class = "image1-item2"></div>
            <div class = "image1-item3"></div>
        </div>
        <div class = "image1-title"></div>
        <div class = "image1-underline"></div>
        <div class = "image1-text1"></div>
        <div class = "image1-text2"></div>
        <div class = "image1-text3"></div>
        <div class = "image1-text4"></div>
        <div class = "image1-text5"></div>
        <div class = "image1-text6"></div>
    </div>
    <div class = "image1-title1">MOD</div>
    <div class = "image1-title2"></div>
    <div class = "image1-title3">ERN</div>
    <div class = "image1-title4">UI</div>
</div>

<div class = "image2-canvas">
    <div class = "image2-bg">
        <div class = "image2-menu">
            <div class = "image2-logo"></div>
            <div class = "image2-item1"></div>
            <div class = "image2-item2"></div>
            <div class = "image2-item3"></div>
        </div>
        <div class = "image2-textbox1"></div>
        <div class = "image2-textbox2"></div>
        <div class = "image2-textbox3"></div>
    </div>
    <div class = "image2-title1">EASY</div>
    <div class = "image2-title3">TO</div>
    <div class = "image2-title4">USE</div>
</div>

<div class = "image3-canvas">
    <div class = "image3-bg">
        <div class = "image3-menu">
            <div class = "image3-logo"></div>
            <div class = "image3-item1"></div>
            <div class = "image3-item2"></div>
            <div class = "image3-item3"></div>
        </div>
        <div class = "image3-textbox1"></div>
        <div class = "image3-textbox2"></div>
        <div class = "image3-textbox3"></div>
        <div class = "image3-lockcircle"></div>
        <div class = "image3-lockbgleft"></div>
        <div class = "image3-lockbgright"></div>
        <div class = "image3-lockhole1"></div>
        <div class = "image3-lockhole2"></div>
    </div>
    <div class = "image3-title1">SECURITY</div>
    <div class = "image3-title2">IS</div>
    <div class = "image3-title3">OUR</div>
    <div class = "image3-title4">PRIORITY</div>
</div>

<script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation')
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active')
        navigation.classList.toggle('active')
    }
    let list = document.querySelectorAll('.list');

    list[0].className = 'list active';
    list[1].className = 'list';
    list[2].className = 'list';
    list[3].className = 'list';
</script>
</body>
</html>