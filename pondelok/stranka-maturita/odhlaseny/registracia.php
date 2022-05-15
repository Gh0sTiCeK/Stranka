<div class = "main">
    <div class = "prihlasenie-place">
        <div class = "prihlasenie">
        <div class="log-title">
            <span class="icon">
            <ion-icon name="person-outline"></ion-icon>
            </span>
        </div>
        <?php
            //inicializacia session
            session_start();
            //vyžiadanie databázy zo súboru databaza.php
            require_once('databaza.php');
            //Toto sa stane po odoslaní formuláru
            if($_POST){
                //kontrola políčok či boli vyplnené správne
                if($_POST['rok'] != date('Y'))                      //antispam
                    echo '<p>Chybne vyplneny antispam.</p>';
                else if($_POST['heslo'] == '')                      //kontrola či bolo zadané heslo
                    echo "<p>Nevyplnili ste heslo.</p>";
                else if($_POST['heslo'] != $_POST['oheslo'])        //kontrola či sa zhoduje heslo
                    echo "<p>Hesla sa nezhoduju.</p>";
                else if($_POST['email'] == '')                      //kontrola či bol email zadaný
                    echo "<p>Nevyplnili ste email.</p>";
                else if($_POST['meno'] !=''){                       //kontrola či už nie je rovnaké meno alebo email použitý
                    $meno = $_POST['meno'];
                    $email = $_POST['email'];
                    $sql = "SELECT name_user FROM uzivatelia WHERE name_user = '$meno' OR email_user = '$email' LIMIT 1;";
                    $result = $conn->query($sql);
                    //ak sa vyhodnotí, že už niekto má také meno alebo email tak vypíše túto správu
                    if($result->num_rows > 0)
                        echo '<p>Uzivatel s tymto menom alebo emailom uz existuje</p>';
                    else{
                        //Priradenie hodnot z formulara do premenných
                        $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);          //hashovanie hesla
                        $meno = $_POST['meno'];
                        $email = $_POST['email'];
                        //registrácia používateľa - vloženie údajov z formuláru do databázy
                        $sqli = "INSERT INTO uzivatelia (name_user, user_password, email_user) VALUES ('$meno', '$heslo', '$email')";
                        $conn->query($sqli);
                        $posledny = $con->insert_id;
                        //uloženie údajov do session
                        $_SESSION['uzivatel_id'] = $con->insert_id;
                        $_SESSION['uzivatel_meno'] = $_POST['meno'];
                        $_SESSION['uzivatel_email'] = $_POST['email'];
                        $_SESSION['uzivatel_admin'] = 0;
                        //presmerovanie po úspešnej registrácii
                        header('Location: prihlaseny/prihlaseny.php?stranka=domov');
                        exit();
                    }
                }else{
                    echo "<p>Nezadali ste svoje meno.</p>";
                }   
            }
        ?>
            <form method="post">
                <div class="icon-holder">
                    <div class="value-holder">
                    <ion-icon name="person"></ion-icon>
                    </div>
                <?php $vyp_meno = (isset($_POST['meno'])) ? $_POST['meno'] : ''; ?>
                <input type="text" placeholder="Meno" name="meno" value="<?php echo htmlspecialchars($vyp_meno); ?>"> <br>
                </div>
                <div class="icon-holder">
                    <div class="value-holder">
                    <ion-icon name="key"></ion-icon>
                    </div>
                <?php $vyp_heslo = (isset($_POST['heslo'])) ? $_POST['heslo'] : ''; ?>
                <input type="password" placeholder="Heslo" name="heslo" value="<?php echo htmlspecialchars($vyp_heslo); ?>"> <br>
                </div>
                <div class="icon-holder">
                    <div class="value-holder">
                    <ion-icon name="key"></ion-icon>
                    </div>
                <?php $vyp_oheslo = (isset($_POST['oheslo'])) ? $_POST['oheslo'] : ''; ?>
                <input type="password" placeholder="Opakuj Heslo" name="oheslo" value="<?php echo htmlspecialchars($vyp_oheslo); ?>"> <br>
                </div>
                <div class="icon-holder">
                    <div class="value-holder">
                    <ion-icon name="mail"></ion-icon>
                    </div>
                <?php $vyp_email = (isset($_POST['email'])) ? $_POST['email'] : ''; ?>
                <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($vyp_email); ?>"> <br>
                </div>
                <div class="icon-holder">
                    <div class="value-holder">
                    <ion-icon name="calendar"></ion-icon>
                    </div>
                <?php $vyp_rok = (isset($_POST['rok'])) ? $_POST['rok'] : ''; ?>
                <input type="password" placeholder="Aktuálny Rok" name="rok" value="<?php echo htmlspecialchars($vyp_rok); ?>"> <br>
                </div>
            <input type="submit" name="submit" value="Registrovať sa"> <br>
        </form>
        </div>
        <div class = "loginText">
                    <?php
                        echo "Máte už účet? ";
                    ?>
                    <a href="index.php?stranka=prihlasenie">
                        <span class="title">Prihlásiť sa</span>
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
    list[2].className = 'list';
    list[3].className = 'list active';
</script>