<?php include_once "header.php"?>
<?php include_once "navbar.php"?>

<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            The list of Employees
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>STT</th>
                        <th>Avatar</th>
                        <th>Tên</th>
                        <th>Age</th>
                        <th>Địa chỉ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($result as $key => $employee): ?>
                    <tr>
                        <td><input type="checkbox" name="deletes"></td>
                        <td><?php echo ++$key ?></td>
                        <td><img src="view/uploads/<?php echo $employee->image ?>" style="width: 200px; height: 250px" alt="Đếu có ảnh"></td>
                        <td><?php echo $employee->Name ?></td>
                        <td><?php echo $employee->Age ?></td>
                        <td><?php echo $employee->Address ?></td>
                        <td>
                            <a href="./home.php?page=details&id=<?php echo $employee->id_employee; ?>" class="btn btn-primary btn-sm">Details Employee</a>
                            <a href="./home.php?page=edit&id=<?php echo $employee->id_employee; ?>" class="btn btn-primary btn-sm">Update</a>
                            <a href="home.php?page=delete&id=<?php echo $employee->id_employee; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once "footer.php"?>