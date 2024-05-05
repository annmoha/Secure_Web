<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Account</title>

</head>

<body> 
    
    <?php
   
global $con;

if (isset($_POST['update'])) {

    $ip = getIp();

    $customer_id = $c_id;

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];  
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

   
    $hashed_pass = hash('sha256', $c_pass);

    if ($_FILES['c_image']['name'] == "") {
        
        $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$hashed_pass', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address' where customer_id='$customer_id'";
    } else {
       
        move_uploaded_file($c_image_tmp, "customer_images/$c_image");
        $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$hashed_pass', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$customer_id'";
    }

    $run_update = mysqli_query($con, $update_c);

    if ($run_update) {
        echo "<script>alert('Your account has successfully updated!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="750">
            <tr align="center">
                <td colspan="6">
                    <h2>Update your Account</h2>
                </td>
            </tr>
            <tr>
                <td align="right">Name:</td>
                <td><input type="text" name="c_name" value="<?php echo $name; ?>" required=""></td>
            </tr>
            <tr>
                <td align="right">Email:</td>
                <td><input type="text" name="c_email" value="<?php echo $email; ?>"</td>
            </tr>
            <tr>
                <td align="right">Password:</td>
                <td><input type="password" name="c_pass" value="<?php echo $pass; ?>"</td>
            </tr>

            <tr>
                <td align="right">Passport ID:</td>
                <td><input type="text" name="c_passport" disabled="" value="<?php echo $passport; ?>"</td>
            </tr>

            <tr>
                <td align="right">Image:</td>
                <td><input type="file" name="c_image"><img src="customer_images/<?php echo $image; ?>" width='50'
                                                           height='50'></td>
            </tr>
            <tr>
                <td align="right">Country:</td>
                <td>
                    <select name="c_country" disabled="">
                        <option><?php echo $country; ?></option>
                        <option>Bangladesh</option>
                        <option>India</option>
                        <option>Japan</option>
                        <option>China</option>
                        <option>Russia</option>
                        <option>Portugal</option>
                        <option>England</option>
                        <option>Brazil</option>
                        <option>Spain</option>
                        <option>France</option>
                        <option>Switzerland</option>
                        <option>Croatia</option>
                        <option>Argentina</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">City:</td>
                <td><input type="text" name="c_city" value="<?php echo $city; ?>"></td>
            </tr>
            <tr>
                <td align="right">Contact:</td>
                <td><input type="text" name="c_contact" value="<?php echo $contact; ?>"></td>
            </tr>
            <tr>
                <td align="right">Address:</td>
                <td><input type="text" name="c_address" value="<?php echo $address; ?>"></td>
            </tr>
            <tr align="center">
                <td colspan="6"><input type="submit" name="update" value="Update Account"></td>
            </tr>
        </table>
    </form>

</body>

</html>

<?php

global $con;

if (isset($_POST['update'])) {

    $ip = getIp();

    $customer_id = $c_id;

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];


    
    $update_c;
    if ($_FILES['c_image']['name'] == "") {
        $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address' where customer_id='$customer_id'";

    } else {
        move_uploaded_file($c_image_tmp, "customer_images/$c_image");
        $update_c = "update customers set customer_name='$c_name', customer_email='$c_email', customer_pass='$c_pass', customer_city='$c_city', customer_contact='$c_contact', customer_address='$c_address', customer_image='$c_image' where customer_id='$customer_id'";
    }

    $run_update = mysqli_query($con, $update_c);

    if ($run_update) {
        echo "<script>alert('Your account has successfully updated!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }

   

}
?>