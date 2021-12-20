
<?php
$con=mysqli_connect("localhost","root","","email");


  if(isset($_REQUEST["submit"]))
  {
    $mobile_number= $_REQUEST["mobile_number"];
    $name= $_REQUEST["name"];
    $email= $_REQUEST["email"];
    $Address= $_REQUEST["Address"];
    $sql=mysqli_query($con,"insert into contact_form (name,email,mobile,address) VALUES('$name', '$email', '$mobile_number', '$Address')");


    require 'class/class.phpmailer.php';
    $mail = new PHPMailer(true);
    try 
    {
        $mail->SMTPDebug = 0;                                       
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username = 'shivamjoshi9897@gmail.com';                 
        $mail->Password = 'Shivam@9897';                        
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;
        $mail->setFrom('shivamjoshi9897@gmail.com', 'Name');           
        $mail->addAddress($email);
          
        $mail->isHTML(true);                                  
        $mail->Subject = 'Mail Testing';
        $mail->Body    = 'Hello <b>'.$name.'</b> ';
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 
  }
     
 


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="background-color:lightgrey;">
<form method="post">
  <div class="container">
   <div class="col-md-12">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="Name" name="name" class="form-control" id="exampleInputName"required>
    </div>
      <div class="mb-3">
    <label for="exampleInputMobile Number" class="form-label">Mobile Number</label>
    <input type="text" name="mobile_number" class="form-control" id="exampleInputMobile Number" maxlength="10" required>
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1"required aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputAddress" class="form-label">Address</label>
    <input type="text" name="Address" class="form-control"required id="exampleInputAddress">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</form>


</body>
</html>