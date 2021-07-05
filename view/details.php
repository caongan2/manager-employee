<?php include_once "header.php" ?>
<?php include_once "navbar.php" ?>

    <div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Employee Information
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Number Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $key => $employee): ?>
                    <tr>
                        <td><?php echo $employee->getName() ?></td>
                        <td><?php echo $employee->getAge() ?></td>
                        <td><?php echo $employee->getAddress() ?></td>
                        <td><?php echo $employee->getNumberPhone() ?></td>
                        <td>
                        </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="index.php?page=list" class="btn btn-danger btn-sm">Cancel</a>
            </div>
        </div>
    </div>

<?php include_once "footer.php" ?>