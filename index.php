<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <title>Ajax Crud</title>
</head>

<body>
  <style>
    .form-control {
      font-size: large;
    }

    .form-control-label {
      font-size: 22px;
    }

    .addclose {
      font-size: larger;
      font-weight: bold;
    }
  </style>
  <div class="container-fluid">
    <h1 class="text-primary text-uppercase text-center h2">Ajax Crud Operation</h1>
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
      </button>
    </div>
    <h2 class="text-uppercase">All Records</h2>
    <div id="records-contant">

    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog" style="max-width : 800px; margin-top : 10%; font-weight : bolder;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="font-weight : bolder;">Ajax Crud Operation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label for="" class="form-control-label">Firstname :- </label>
              <input type="text" name="" id="firstname" class="form-control" placeholder="First Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="" class="form-control-label">Lastname :- </label>
              <input type="text" name="" id="lastname" class="form-control" placeholder="Last Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="" class="form-control-label">Email ID :- </label>
              <input type="text" name="" id="emailid" class="form-control" placeholder="Email ID" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="" class="form-control-label">Mobile No :- </label>
              <input type="tel" name="" id="mobileno" class="form-control" placeholder="Mobile No" autocomplete="off">
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success addclose" data-dismiss="modal" onclick="addrecord()">Save</button>
            <button type="button" class="btn btn-danger addclose" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="update_user_modal">
      <div class="modal-dialog" style="max-width : 800px; margin-top : 10%; font-weight : bolder;">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="font-weight : bolder;">Ajax Crud Operation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label for="updt_firstname" class="form-control-label">Firstname :- </label>
              <input type="text" name="" id="updt_firstname" class="form-control" placeholder="First Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="updt_lastname" class="form-control-label">Lastname :- </label>
              <input type="text" name="" id="updt_lastname" class="form-control" placeholder="Last Name" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="updt_emailid" class="form-control-label">Email ID :- </label>
              <input type="text" name="" id="updt_emailid" class="form-control" placeholder="Email ID" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="updt_mobileno" class="form-control-label">Mobile No :- </label>
              <input type="tel" name="" id="updt_mobileno" class="form-control" placeholder="Mobile No" autocomplete="off">
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success addclose" data-dismiss="modal" onclick="updateuser()">Save</button>
            <button type="button" class="btn btn-danger addclose" data-dismiss="modal">Close</button>
            <input type="hidden" name="" id="hidden_user_id">
          </div>

        </div>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      readRecords();
    });

    function readRecords() {
      var readrecord = "readrecord";
      $.ajax({
        url: 'backend.php',
        type: 'POST',
        data: {
          readrecord: readrecord
        },
        success: function(data, status) {
          $('#records-contant').html(data);
        }
      });
    }

    function addrecord() {
      var firstname = $('#firstname').val();
      var lastname = $('#lastname').val();
      var emailid = $('#emailid').val();
      var mobileno = $('#mobileno').val();


      $.ajax({
        url: 'backend.php',
        type: 'POST',
        data: {
          firstname: firstname,
          lastname: lastname,
          emailid: emailid,
          mobileno: mobileno
        },

        success: function(data, status) {
          readRecords();
          window.location.reload(true);
        }
      });
    }


    function DeleteUser(deleteid) {
      var conf = confirm("Are You Sure");
      if (conf == true) {
        $.ajax({
          url: "backend.php",
          type: "POST",
          data: {
            deleteid: deleteid
          },
          success: function(data, status) {
            readRecords();
          }
        });
      }
    }

    function GetUserDetails(updateid) {
      $('#hidden_user_id ').val(updateid);
      $.post("backend.php", {
        updateid: updateid,
      }, function(data, status) {
        var updateusertime = JSON.parse(data);
        $('#updt_firstname').val(updateusertime.firstname);
        $('#updt_lastname').val(updateusertime.lastname);
        $('#updt_emailid').val(updateusertime.emailid);
        $('#updt_mobileno').val(updateusertime.mobileno);
      });
      $('#update_user_modal').modal("show");
    }

    function updateuser() {
      var firstnameupd = $('#updt_firstname').val();
      var lastnameupd = $('#updt_lastname').val();
      var emailidupd = $('#updt_emailid').val();
      var mobilenoupd = $('#updt_mobileno').val();

      var hidden_user_idupd = $('#hidden_user_id').val();

      $.post("backend.php", {
        hidden_user_idupd: hidden_user_idupd,
        firstnameupd: firstnameupd,
        lastnameupd: lastnameupd,
        emailidupd: emailidupd,
        mobilenoupd: mobilenoupd,
      }, function(data, status) {
        $('#update_user_modal').modal("hide");
        readRecords();
      });
    }
  </script>
</body>

</html>