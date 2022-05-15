<?php
    session_start();
    require("../databaza.php");
    $id_article = $_SESSION['edit_id'];
    //ochrana pred vratenim sipkou spat
    if(isset($_SESSION['uzivatel_meno']) == ''){
        session_destroy();
        header('Location: ../odhlaseny/index.php?strnka=prihlasenie');
    }
    if($_POST){
        $nazov = $_POST['titles'];
        $obsah = $_POST['obsah'];
        $popis = $_POST['popis'];
        $uziv_id = $_SESSION['uzivatel_id'];
        //aktualizovanie údajov v databáze
        $sqlu = "UPDATE clanky SET title = '$nazov', content = '$obsah', subscribe = '$popis' where id_article='$id_article'";
        $conn->query($sqlu);
        header('Location: prihlaseny.php?stranka=clanky');      //presmerovanie späť na články
    }
    //načítanie článku z databázy
    $sqle = "SELECT * FROM clanky WHERE id_article = $id_article";
    $editing = $conn ->query($sqle);
    if(isset($editing)){
        //priradenie hodnôt do premenných ktoré budeme vypisovať do formuláru
        while($rows = $editing->fetch_row()){
        $id_article = $rows['0'];
        
        $id_user = $rows[0];
        $title = $rows[1];
        $text = $rows[2];
        $popisok = $rows[4];
        }
        ?>
        <?php echo '<div class="main">'; ?>
        <?php echo '<div class="clanek-a">'; ?>
        <?php echo '<a href="clanky.php">'; ?>
        <?php echo '</div>'; ?>
        <?php echo '<div class="back"><div class="back-icon"> < </div> <div class="back-text"> NÁVRAT</div></div>'; ?>
        <?php echo '</a>'; ?>
        <?php echo '<h1>ÚPRAVA ČLÁNKU:</h1>'; ?>

        <form action="" method="post">
        <div class="value-holder">
            <div class="icon-holders">
            <ion-icon name="reader-outline"></ion-icon>
            </div>
            <input type="text" name="titles" value="<?php echo $title ?>"> <br>
        </div>
        <div class="value-holder">
            <div class="icon-holders">
            <ion-icon name="chatbox-ellipses-outline"></ion-icon>
            </div>
            <input type="text" name="popis" value="<?php echo $popisok ?>"> <br>
        </div>
        <textarea name="obsah" id="texty" cols="30" rows="10"><?php echo $text ?></textarea><br />
        <input type="submit" name="odoslat" value='Upraviť článok'>
        </form>
        <?php echo '</div>'; ?>
        <?php
    }
?>