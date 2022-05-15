<div class="main">
<div class="clanky">
    <?php

require("../databaza.php");
session_start();
if(isset($_GET['delete'])){
    $id_article = $_GET['delete'];
    $conn -> query("DELETE FROM clanky WHERE id_article = $id_article") or die($conn);
    header('location: prihlaseny.php?stranka=clanky');    //resmerovanie späť na články
}

if(isset($_GET['edit'])){
    $id_article = $_GET['edit'];
    $_SESSION['edit_id'] = $id_article;
    header('location: prihlaseny.php?stranka=edit');
    // $conn -> query("DELETE FROM article WHERE id_article = $id_article") or die($conn);
}

if(isset($_GET['url'])){
$url = $_GET['url'];

if($url){
    
        $sqla = "SELECT * FROM article 
                INNER JOIN uzivatelia ON uzivatelia.id_user=clanky.id_user
                WHERE clanky.url_article = $url";
        $result = $conn ->query($sqla);
        if(isset($result)){
            while($row = $result->fetch_row()){
            $id_article = $row['0'];

            $id_user = $row[0];
            $title = $row[1];
            $content = $row[2];
            $subscribe = $row[4];
            $user = $row[7];
            }

            echo '<div class="clanek">';
            echo '<div class="clanek-a">';
            echo '<a href="clanky.php">';
            echo '</div>';
            echo '<div class="back"><div class="back-icon"> < </div> <div class="back-text"> NÁVRAT</div></div>';
            echo '</a>';

            echo '<h1>'.$title.'</h1>';
            echo '<h2>'.$subscribe.'</h2>';
            echo '<br><p>'.$content.'</p><br>';
            echo '<div class="autor"><p> Autor: '.$user.'</p></div>';
            echo '</div>';
        }
    }

else{
     echo "Neplatný parameter.";
}   

}else{
        $sql = "SELECT * FROM clanky";      //výber údajov z databázy pre články
        $result = $conn->query($sql);
        if($result->num_rows > 0){      //ak sa nájde aspoň jeden článok v databáze tak sa vypíšeS
            foreach($result as $row){
                // echo '<a href=clanky.php?url="'.$row['url_article'].'" target="_blank"> <div class="article">';
                echo '<div class=article>';
                echo '<a href=clanky.php?url="'.$row['url_article'].'" target="_blank">';
                echo '<div class="article-content"><div class="article-content1"> <p>'.$row['content'].'</div><div class="article-content2"><div class="article-content2-img"></div></p></div> <div class="article-content2"></div> </div>';
                echo '<h1>'.$row['title'].'</h1>';
                echo '<h3>'.$row['subscribe'].'</h3><br><br>';
                // echo '<button action="clanky.php?delete='.$row['id_article'].'>D</button>';
                // echo '</div></a>';
                echo '<h3><div class=del-edit><div class=del><a href=clanky.php?delete='.$row['id_article'].'>Vymazať</a></div><div class=edit><a href=clanky.php?edit='.$row['id_article'].'>Edit</a></div></div><h3>';
                // echo '<form method="post"> <button action="delete">Delete</button> </form>';
                echo '</div></a>';
            }
        }else{      //ak sa nenachádza v databáze ani jden článok toto vypíše
            echo "V databáze sa nenachádzajú žiadne články";
        }
    }
    
    ?>

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
    list[4].className = 'list';
    list[5].className = 'list';
</script>