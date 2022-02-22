<?php
    include 'employeeManager.php';

    $employeeManager = new EmployeeManager();
    $data = $employeeManager->getAllEmployees();

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
                    foreach($data as $employee){
            ?>

            <tr>
                <td><?= $employee->getFirstName()?></td>
                <td><?= $employee->getLastName()?></td>
                <td><?= $employee->getAge()?></td>
                <td>
                    <a href="edit.php?id=<?php echo $employee->getId() ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $employee->getId() ?>">delete</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>