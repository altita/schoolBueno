<?php

  // once there are no errors, as soon as the customer hits the submit button,
  // it needs to send an email to the staff with the customer information
  $msg = "Name: " .$_POST['name'] . "\n"
       . "Email: " .$_POST['email'] . "\n"
       . "Phone: " .$_POST['telephone'] . "\n"
       . "Number Of Guests: " .$_POST['numberOfGuests'] . "\n"
       . "Date Of Reunion: " .$_POST['date'];
  $staffEmail = "staffinfo";
  mail($staffEmail, "You have a new customer", $msg);

  // once the customer submits his/her information, he/she will receive a thank
  // you message attach with a pdf file.
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont("Arial", "B", 16);
  $pdf->Cell(40, 10, "Hello World!");

  // email information
  $to = $_POST['email'];
  $from = $staffEmail;
  $subject = "Thank you for your business";
  $message = "Thank you for submitting your information!";

  // a random hash will be necessary to send mixed content
  $separator = '-=-=-'.md5(microtime()).'-=-=-';

  // attachment name
  $filename = "yourinformation.pdf";

  // Generate headers
  $headers = "From: $from\r\n"
           . "MIME-Version: 1.0\r\n"
           . "Content-Type: multipart/mixed; boundary=\"$separator\"\r\n"
           . "X-Mailer: PHP/" . phpversion();

  // Generate body
  $body = "This is a multipart message in MIME format\r\n"
        . "--$separator\r\n"
        . "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"
        . "\r\n"
        . "$message\r\n"
        . "--$separator\r\n"
        . "Content-Type: application/pdf\r\n"
        . "Content-Transfer-Encoding: base64\r\n"
        . "Content-Disposition: attachment; filename=\"$filename\"\r\n"
        . "\r\n"
        . chunk_split(base64_encode($pdf->Output("", "S")))."\r\n"
        . "--$separator--";

  // send message
  mail($to, $subject, $body, $headers);
