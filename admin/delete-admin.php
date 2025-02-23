<?php
    include('../config/constants.php');

    // 1. Get the id of Admin to be deleted
    $id = $_GET['id']; 

    // 2. Create SQL Query to Delete Admin
    $sql = "delete from tbl_admin where id = $id"; 

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not 
    if($res==true)
    {
        // Query Executed Successfully and Admin Deleted
        // echo "admin deleted"
        // Create Session variable to Display message
        $_SESSION['delete'] = "Admin deleted successfully";
        // Redirect to manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        // Failed to delete admin
        $_SESSION['delete'] = "Failed to delete admin. Try Again Later.";
        header("location:".SITEURL.'admin/manage-admin.php');
    } 

?>