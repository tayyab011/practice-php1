<?php
include_once("./conn.php");

if (isset($_POST['delmodal'])) {
    $delid = $_POST['delid'];
    $delete = $conn->query("DELETE FROM `pt` WHERE `id` = $delid");
    if ($delete) {
        echo "<script>
            setTimeout(() => {
                location.href='./index.php'
            }, 300);
        </script>";
    }
}
if (isset($_POST['upmodal'])) {
    $upid = $_POST['upid'];
     $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $comment = $_POST['comment'];
    $update = $conn->query("UPDATE `pt` SET `name`='$name',`email`='$email',`number`='$number' , `password`='$password',`comment`='$comment' WHERE `id` = $upid");
    if ($update) {
        echo "<div style='width:600px;height:90px;align-item:center;text-align:center;font-size:30px;background:green;color:white;margin:auto;padding-top:20px;'>update successfull</div>";
        echo "<script>
            setTimeout(() => {
                location.href='./index'
            }, 2000);
        </script>";
    }else{
        echo "<div style='text-align:center;font-size:30px'>update unsuccessfull</div>";
    }
}
?>

<style>
    .col-md-6 {
        outline: none;
        pla
    }

    input::placeholder {
        text-align: center;
        color: black;
        font-size: 20px;
    }

    label {
        text-align: center;
        color: black;
        font-size: 20px;
    }
</style>

<table class="table">
    
    <?php
    $display_data = $conn->query("SELECT * FROM `pt`");
    if ($display_data->num_rows > 0) {
        echo'<thead>
        <tr>
            <th scope="col">sn</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">password</th>
            <th scope="col">comment</th>
            <th scope="col">operations</th>
        </tr>
    </thead>';
        /*  mysqli_num_rows($display_data)> 0 */
       $sn= 1;
        while ($row = mysqli_fetch_assoc($display_data)) {
    ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $sn ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['number'] ?></td>
                    <td><?php echo $row['password'] ?></td>
                    <td><?php echo $row['comment'] ?></td>
                    <td>
                        <a class='btn btn-primary' onclick="setupdateId(<?php echo $row['id']; ?>)" data-bs-toggle='modal' data-bs-target='#id'><i class="fa-solid fa-pen-to-square"></i></a>

                        <a class='btn btn-danger' onclick="setDeleteId(<?php echo $row['id']; ?>)" data-bs-toggle='modal' data-bs-target='#iddelete'><i class="fa-solid fa-delete-left"></i></a>
                    </td>
                </tr>
            <?php
        $sn++;
        }
    }else{
        echo '<div style="text-align:center;font-width:bold;font-size:20px;">No Data Available</div>';
    }
    ?>
</tbody>
</table>

            <!--  modal -->
            <div class="modal modal-lg" tabindex="-1" id='id'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action='' method='post' class='mx-auto justify-content-center text-center'>
                                <input type="hidden" name="upid" id="upid">
                                <label for='name'>Name:</label>
                                <input value=''  required type='text' name='name'   class='col-md-6' pattern="[A-Za-z\s]+" title="Name should contain only letters (A-Z/a-z) and spaces." /><br />
                                <label for='email' class='mt-3'>Email:</label>
                                <input value=''  required type='email' name='email' class='col-md-6' /><br />
                                <label for='number' class='mt-3'>Number:</label>
                                <input value='' required type='number' name='number' class='col-md-6' pattern="^[0-9]{10,15}$" title="Phone number should contain only digits (0-9) and be between 10 and 15 characters long." /><br />
                                <label for='password' class='mt-3'>Password:</label>
                                <input value='' required type='password' name='password' class='col-md-6' pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Password should be at least 6 characters long and contain at least one letter and one digit." /><br />
                                <label for='comment' class='mt-4'>Comment:</label>
                                <textarea value='' required id='comment' name='comment' class='col-md-6 mt-4' rows='2'></textarea><br>

                                <div class="modal-footer">
                                    <button name='upmodal' type='submit' class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--  modal -->

            <!-- delet modal -->
            <div class="modal modal-lg" tabindex="-1" id='iddelete'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action='' method='post' class='mx-auto justify-content-center text-center'>
                                <input type="hidden" name="delid" id="delid">
                                <p>Do you want to delete this id?</p>
                                <div class="modal-footer">
                                    <button name='delmodal' type='submit' class="btn btn-danger">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete modal -->


<!-- JavaScript function to set the value of the input field "delid" -->
<script>
    function setDeleteId(id) {
        document.getElementById('delid').value = id;
    }



    function setupdateId(id) {
        document.getElementById('upid').value = id;
        
        
    }
</script>
