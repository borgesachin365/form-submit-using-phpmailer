<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How to send mail in php using PHPmailer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h4>How to send mail in php using PHPmailer</h4>
    </div>
    <div class="card-body">
      <form action="sendmail.php" method="POST">
          <div class="mb-3">
            <label for="fullname">Full Name</label>
            <input type="text" name="full_name" id="fullname" required class="form-control" onkeyup="this.value=this.value.replace(/[^a-zA-Z \n\r.]+/g, '');"/>
          </div>
          <div class="mb-3">
            <label for="email_address">Email Address</label>
            <input type="email" name="email" id="email_address" required class="form-control" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" onkeyup="this.value=this.value.replace(/[^a-zA-Z@.[0-9] \n\r.]+/g, '');"/>
          </div>
          <div class="mb-3">
            <label for="mobile_no">Mobile No</label>
            <input type="number" name="mobile" id="mobile_no" required class="form-control" onkeyup="this.value=this.value.replace(/[^0-9]+/g,'');"/>
          </div>
          <div class="mb-3">
            <label for="message">Message</label>
            <textarea name="message" id="message" required row="3" class="form-control" ></textarea>
          </div>
          <div class="mb-3">
            <button type="submit" name="submitContact" class="btn btn-primary">Send Mail</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var messageText = "<?= $_SESSION['status'] ?? '';  ?>";
    if(messageText != ''){
    Swal.fire({
    title: "Thank You!",
    text: messageText,
    icon: "success"
    });
    <?php unset($_SESSION['status']) ?>
  }
  </script>
</body>
</html>