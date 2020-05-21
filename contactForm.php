<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("dbconfig.php");
$sendTo = "admin@arderuniversity.com";
$from = "praveen.t1393@gmail.com";
$mailSuccessMsg = "Your message has been sent";
$mailFailMsg = "Error in sending mail, check with Admin";
$response = array();

if(isset($_POST['']))
{
    $name = !empty($_POST['name']) ? strip_tags($_POST['name']) : '';
    $email = !empty($_POST['email']) ? strip_tags($_POST['email']) : '';
    $address = !empty($_POST['address']) ? strip_tags($_POST['address']) : '';
    $message = !empty($_POST['message']) ? strip_tags($_POST['message']) : '';

    $emailText = "Name :".$name.'\n'.
                "Email:".$email.'\n'.
                "Address:".$address.'\n'.
                "Message:".$message.'\n';

    // Insert in Database table
    $insertSql = "INSERT INTO contact_form (username, email, address, message) VALUES ($name, $email, $address, $message)";

    if ($conn->query($insertSql) === TRUE) {
        // Send email
        $headers = "";
        if(mail($sendTo, $subject, $emailText, $headers) )
        {
            $response['status'] = "success";
            $response['message'] = $mailSuccessMsg;
            

        }else{
            $response['status'] = "fail";
            $response['message'] = $mailFailMsg;
        }
        
    } else {
         echo "Error: " . $conn->error;
    }

    echo json_encode($response);
    exit;
}
?>
<html>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Arden University Contact Form</title>
        <meta name="description" content="Shop">
        <meta name="author" content="Arden University">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <script type="text/javascript">
    $(document).ready(function() { alert("12");
        $("#arden_contact_form").submit(function(e)
        {
            e.preventDefault();
            if($("#name").val() == '' || $("#email").val() == '')
            {
                alert("Please enter name and email"); 
                return false;
            }
            
            $.ajax({
                type: "POST",
                url: '/',
                data: $(this).serialize(),
                dataType: 'json'
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "success")
                    {
                        $('#success_message').show();
                        $('#error_message').hide();
                    }
                    else
                    {
                        $('#success_message').hide();
                        $('#error_message').show();
                    }
                }
                
            });
        });
    });
    </script>
<body>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="form_contact" style="padding-left:50px;">
            <h2>Contact Us</h2>
            <div id="success_message" style="width:100%; height:100%; display:none; ">
                <h3>your message Send successfully!</h3>
            </div>
            <div id="error_message" style="width:100%; height:100%; display:none; ">
                        <h3>Error</h3>
                        Sorry there was an error sending your form.
            </div>
            
            <form name="form" method="post" id="arden_contact_form">

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="address">
                            Address:</label>
                        <textarea class="form-control" type="textarea" name="address" id="address" maxlength="200" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">
                            Message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="200" rows="3" requirec></textarea>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-success btn-send" >Send</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
</html>