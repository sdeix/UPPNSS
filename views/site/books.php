
<h1>Каталог</h1>

<form name="feedback" method="PUT" action="">
    <label>Введите название книги: <input type="text" id="name" name="name"></label>

    <input type="submit" name="send" value="Отправить">
</form>


<?php

    if (isset($_GET)) {
        $name = $_GET['name'];
    }

?>
<ol>
   <?php
   if($name==''){
   foreach ($books as $book) {
       echo '<li>' . $book . '</li>';
   }
   }
   else{
   foreach ($books as $book) {

    if ($name==$book->name){
    echo '<li>' . $book . '</li>';
    }
   }
   }

   ?>
</ol>