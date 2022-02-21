<?php
    include 'config.php';
    include 'personManager.php';

    $personManager = new PersonManager();
    $data = $personManager->getAllpersons($conn);

?>



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

            <?php
                    foreach($data as $value){
            ?>

            <tr>
                <td><?= $value['prenom']?></td>
                <td><?= $value['nom']?></td>
                <td><?= $value['age']?></td>
                <td>
                    <a href="edit.php?id=<?php echo $value['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $value['id'] ?>">delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>