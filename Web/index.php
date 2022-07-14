
    <?php require_once "header.php";
    ?>
    <section class="news">
        <div class="container">
            <div class="news__inner">
                <?php
                    $sql ='SELECT * FROM `news`';
                    // $sh = $pdo->prepare($sql);
                    // $sh->execute();
                    // $fetch = $sh->fetchAll(PDO::FETCH_ASSOC);
                    foreach(query($sql) as $result){
                        echo '<div class="item">
                        <div class="title">'.$result['title'].'</div>
                        <div class="descr">'.$result['descr'].'</div>
                        </div>';
                    }
                ?>

            </div>
        </div>
    </section>
</body>
</html>