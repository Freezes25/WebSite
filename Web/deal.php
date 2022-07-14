 <?php require_once "header.php"; ?>

<section class="deal">
 <form action="#" method="POST">
    <select name="cosmos">
    <option>Корабль</option>
    <?php 
        $sql = 'SELECT * FROM `flight`';
        foreach(query($sql) as $deal) echo  '<option>'.$deal['title'].'</option>'  
    ?>
    </select>
    <select name="number">
    
    <option>Место</option>
    <option>1</option>
    <option>2</option>
    </select>
    <button type="submit">Отправить</button>
 </form>

</section>

</body>
</html>