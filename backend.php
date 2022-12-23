<?php 
    $conn = new mysqli('localhost','root',"Kev@l8347",'ajax-crud');

    extract($_POST);

    if (isset($_POST['readrecord'])) {
        $data = '<table class="table table-bordered table-striped" style = "text-align : center;">
                    <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email ID</th>
                    <th>Mobile No.</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>';

        $displayquery = "SELECT * FROM `ajax-crud`";
        $result = mysqli_query($conn,$displayquery);

        if (mysqli_num_rows($result) > 0) {
            $number = 1;
            while ($row = mysqli_fetch_array($result)) {
                $data .= '<tr>
                            <td>'.$number.'</td>
                            <td>'.$row['firstname'].'</td>
                            <td>'.$row['lastname'].'</td>
                            <td>'.$row['emailid'].'</td>
                            <td>'.$row['mobileno'].'</td>
                            <td>
                                <button onclick = "GetUserDetails('.$row['id'].')" class = "btn btn-warning">Update</button>
                            </td>
                            <td>
                                <button onclick = "DeleteUser('.$row['id'].')" class = "btn btn-danger">Delete</button>
                            </td>
                        </tr>';
                        $number++;
            }
        }
        $data .= '</table';
        echo $data; 
    }

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['emailid']) && isset($_POST['mobileno'])) {
        $query = "INSERT INTO `ajax-crud`(`firstname`, `lastname`, `emailid`, `mobileno`) VALUES ('$firstname','$lastname','$emailid','$mobileno')";
                    mysqli_query($conn,$query);
    }

    if (isset($_POST['deleteid'])) {
        $userid = $_POST['deleteid'];
        $delete = "DELETE FROM `ajax-crud` WHERE id='$userid'";
        mysqli_query($conn,$delete);
    }

    if (isset($_POST['updateid']) ) {
        $user_id = $_POST['updateid'];
        $query = "SELECT * FROM `ajax-crud` WHERE id =".$user_id;
        if (!$result = mysqli_query($conn,$query)) {
            exit(mysqli_error($conn,$query));
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        } else {
            $response['status'] = 200;
            $response['message'] = "Data Not Found!";
        }
        echo json_encode($response); 
    } else {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }


    if (isset($_POST['hidden_user_idupd'])) {
        $hidden_user_idupd = $_POST['hidden_user_idupd'];
        $firstnameupd = $_POST['firstnameupd'];
        $lastnameupd = $_POST['lastnameupd'];
        $emailidupd = $_POST['emailidupd'];
        $mobilenoupd = $_POST['mobilenoupd'];

        $query = "UPDATE `ajax-crud` SET `firstname`= '$firstnameupd',`lastname` = '$lastnameupd',`emailid` = '$emailidupd',`mobileno` = '$mobilenoupd' where id = '$hidden_user_idupd'";
        $result = mysqli_query($conn,$query);
    }
?>