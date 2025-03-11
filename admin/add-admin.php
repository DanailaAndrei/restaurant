<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']); // Removing session message
            }
        ?>
        
        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from form and save it in a database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked    
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        // SQL Query to save the data into the database
        $sql = "insert into tbl_admin set 
            full_name='$full_name',
            username='$username',
            password='$password'
            ";
        
        // Execute query and save data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check whether the data is inserted or not(query executed or not)
        if($res == true)
        {
            // Data inserted
            // Create session variable
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            // Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed to insert
            $_SESSION['add'] = "<div class='error'>Failed to add admin. Try again later.</div>";
            // Redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>