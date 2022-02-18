<?php
    $getfile = file_get_contents('people.json');
    $data = json_decode($getfile);
?>


<html lang="en">
<body>
    <div>
        <a href="insert.php">Insert Data</a>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Action</th>
            </tr>

            <?
                    foreach($data as $value){
                    
            ?>

            <tr>
                <td><?= $value[1]?></td>    <!-- ?php echo -->
                <td><?= $value[2]?></td>
                <td><?= $value[3]?></td>
                <td>
                    <a href="edit.php?id=<?php echo $value[0] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $value[0] ?>">delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>