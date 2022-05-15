<?php
$servername = "localhost";          //priradenie do premennej servername hodnotu localhost
$username = "root";                 //priradenie do premennej username hodnotu root
$password = "";                     //tým že databáza nie je zaheslovaná, tak nmetreba dávať heslo
$dbname = "maturitka";         //priradenie do premennej dbname meno databazy

$conn = new mysqli($servername, $username, $password, $dbname);     //vytvorenie databazy s hodnotami premmených
if($conn -> connect_error){                                         //ak sa nepodarí pripojiť alebo nastane chyba,
    die("Spojenie sa nepodarilo".connect_error);                    //tak napíŠe, že sa spojenie nepodarilo
}
//echo "spojenie sa podarilo";                                      //napíše nám túto správu ak sa podarí spojenie
?>