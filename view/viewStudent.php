<!-- Merupakan halaman Student -->

<!-- mengambil header -->
<?php 
    require_once 'view/layout/header.php'
?>

<!-- Mengambil sidebar -->

<?php 
require_once 'view/component/sidebar.php'
?>

<div class="container mt-5">   
    
    <div class="container-fluid">
        <h1 class="text-center">Student</h1>
    </div>

    <div class="container-fluid">
        <?php 
            Flasher::flash();
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudent">Add Student</button>
    </div>
    

    <div class="container mx-lg pt-3 scroll">
    
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm display nowrap">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">dept_name</th>
                    <th scope="col" >tot_cred</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <td><?=$row["ID"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["dept_name"]?></td>
                    <td><?=$row["tot_cred"]?></td>
                    <td class="fit">
                        <a class="badge bg-success showModalEdit"  data-bs-toggle="modal" data-bs-target="#editStudent" data-id="<?=$row["ID"]?>">Edit</a>
                        <a class="badge bg-danger" href="<?=BASEURL?>/deleteStudent.php?id=<?=$row["ID"]?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
    </div>
</div>

<!-- Modal -->  
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="addStudent" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addStudentLabel">Add Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="addStudent.php" method="post">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="dept_name">Departement Name</label>
                        <select class="form-select form-select-sm" aria-label="dept_name" name="dept_name">
                            <?php foreach ($departments as $row): ?>
                            <option value="<?php echo $row['dept_name'];?>">
                                <?php echo $row['dept_name'];?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total Credit</label>
                        <input type="number" name="tot_cred" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer mb-3">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editStudent" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <form action="editStudent.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="" id="new_id">
                    
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="new_name" id="new_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="dept_name">Departement Name</label>
                        <select class="form-select form-select-sm" aria-label="dept_name" name="new_dept_name" id="new_dept_name">
                            <?php foreach ($departments as $row): ?>
                            <option value="<?php echo $row['dept_name'];?>">
                                <?php echo $row['dept_name'];?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Total Credit</label>
                        <input type="number" name="new_tot_cred" class="form-control" id="new_tot_cred" required>
                    </div>
                </div>
                <div class="modal-footer mb-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- mengambil footer -->

<?php 
require_once 'view/layout/footer.php';
?>