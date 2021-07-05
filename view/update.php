<?php include "header.php" ?>

<form action="" method="post" enctype="multipart/form-data">
    <?php foreach ($employees as $key => $employee):?>
    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="text" class="form-control" value="<?php echo $employee->getName()?>" name="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputAge1">Age</label>
        <input type="number" class="form-control" name="age" value="<?php echo $employee->getAge()?>">
    </div>
    <div class="form-group">
        <label for="exampleInputAddress1">Address</label>
        <input type="text" class="form-control" name="address" value="<?php echo $employee->getAddress()?>">
    </div>
    <div class="form-group">
        <label for="exampleInputNumberPhone1">Number Phone</label>
        <input type="number" class="form-control" name="numberPhone" value="<?php echo $employee->getNumberPhone()?>">
    </div><div class="form-group">
        <label for="exampleInputDepartment1">Department</label>
        <select class="form-control" name="department" aria-describedby="emailHelp">
            <option value="1">Employee</option>
            <option value="2">Marketing</option>
            <option value="3">Sercurity Team</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputLocation1">Location</label>
        <select class="form-control" name="location">
            <option value="1">Leader</option>
            <option value="2">Staff</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputDegree1">Degree</label>
        <select class="form-control" name="degree">
            <option value="1">Thạc sĩ</option>
            <option value="2">Tiến sĩ</option>
            <option value="3">Giáo sư</option>
            <option value="4">Kỹ sư</option>
        </select>
    </div>
    <div>
        <label for="" class="form-label">Image</label>
        <td><img src="view/uploads/<?php echo $employee->getImage() ?>" style="width: 200px; height: 250px" alt="Đếu có ảnh"></td>
        <input type="file" name="fileUpload" id="fileUpload">
    </div>
<?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Uppdate</button>
    <a href="../home.php" class="btn btn-danger">Cancel</a>
</form>
<?php include "footer.php"?>
