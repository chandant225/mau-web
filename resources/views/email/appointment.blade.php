<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            width: 50%;
            margin: auto;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <div>
        <h1>Submitted details</h1>
        
        <p>Full Name : {{ $mailData['fullname'] }}</p>
        <p>Phone : {{ $mailData['phone'] }}</p>
        <p>Email : {{ $mailData['email'] }}</p>
        <p>Date : {{ $mailData['date'] }}</p>
        <p>Time : {{ $mailData['time'] }}</p>
        <p>Message : {{ $mailData['message'] }}</p>
    </div>
</body>

</html>
