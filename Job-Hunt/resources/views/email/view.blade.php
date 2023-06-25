<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Sent</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }
    
    p {
      font-size: 18px;
      line-height: 1.5;
    }
    
    .email-address {
      font-weight: bold;
      color: #333;
    }
    
    .button {
      display: inline-block;
      background-color: #4CAF50;
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 4px;
      transition: background-color 0.3s;
    }
    
    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Email Sent</h1>
    <p>A {{ strtolower($subject) }} mail has been sent to your email address: <span class="email-address">{{ $email }}</span>.</p>
    <p>Please check your inbox and follow the instructions to complete the process.</p>
  </div>
</body>
</html>
