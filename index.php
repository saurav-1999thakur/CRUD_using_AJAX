<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <title>index</title>
    </head>
    <body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat  container">
        
      <div class="card mb-5 mb-xl-8">
        <div class="card-body py-3">
          <form id="ajaxForm" enctype="multipart/form-data" >
          <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example1" name="name" class="form-control" />
              <span style="color:red">*</span>
              <label class="form-label" for="form6Example1">Name</label>
            </div>
          </div>
          <div class="col">
          <div class="form-outline mb-4">
          <input type="file" id="form6Example3" name="profile" class="form-control" />
          <label class="form-label" for="form6Example3">Profile Picture</label>
          </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="number" id="form6Example2" name="contact" class="form-control" />
              <label class="form-label" for="form6Example2">Contact</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="email" id="form6Example2" name="email" class="form-control" />
              <label class="form-label" for="form6Example2">Email</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
            <select name="company" class="form-control">
            <option>select Company</option>
            <option>Google</option>
            <option>Genpact</option>
            <option>Microsoft</option>
            <option>Nestle</option>
            </select>
              <label class="form-label" for="form6Example2">Prefered Company</label>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="form-outline">
              <textarea name="address" class="form-control" id="exampleFormControlTextarea1" cols="30" rows="3"></textarea>
              <label class="exampleFormControlTextarea1" for="form6Example2">Address</label>
            </div>
          </div>
          <div class="form-outline mb-4">
            <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
          </div>
          </form>
             <div class="form-outline mb-4">
            <button type="btn" class="btn btn-primary btn-block mb-4">list.php</button>
          </div>
        </div>
      </div>
   <script type="text/javascript">
      $(document).ready(function(){
        $("#ajaxForm").submit(function(e){
          // alert("oops");
          e.preventDefault();
          var fd = new FormData();
          var fileName = $('#file')[0];
          var name = $('#name').val();
          var email = $('#email').val();
          var contact = $('#contact').val();
          var company = $('#company').val();
          var address = $('#address').val();
          fd.append('file',fileName.files[0]);
          fd.append('name',name);
          fd.append('email',email);
          fd.append('contact',contact);
          fd.append('company',company);
          fd.append('address',address);
          $.ajax({
            type:'POST',
            url:'insert.php',
            data:fd,
            contentType: false,
            processData: false,
            // data:$(this).serialize(),
            success:function(data){
              // alert(data);
              // console.log(data);
              if(data=="success"){
                swal({title: "Thankyou!",text: "Submitted! successfully",icon: "success"}).then(function() {window.location ="list.php";});
              }else{
                swal({title: "sorry!",text: "Not Submitted!",icon: "error"}).then(function() {window.location ="index.php";});
              }
            }
          });

        });
      });
    
    </script>
    </body>

</html>
