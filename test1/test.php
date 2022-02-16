<?php
$afficheficher = file_get_contents('test.json');
$data = json_decode($afficheficher);
?>
<html>
  <body>
  <a href="test1.php"><i></i> Insert Data</a>
    <div>
      <table>
        <tr>
            <th>.NO</th>
            <th>first name</th>
            <th>last name</th>
            <th> age</th>
        </tr>
        <? foreach($data as $value){
        ?>
        <tr>
            <td><?= $value[0] ?></td>
            <td><?= $value[1] ?></td>
            <td><?= $value[2] ?></td>
        </tr>
        <?php }?>
        </table>
    </div>
  </body>
</html>
