<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Voucher Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        p {
            line-height: 1.5;
            margin: 10px 0;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Congratulations on Your Purchase!</h1>
        <p>Dear Customer,</p>
        <p>We are thrilled to inform you that you have successfully purchased the voucher for <strong>{{ $vouchar->vouchar_name }}</strong>.</p>
        <p>This voucher allows you to enjoy a range of exclusive benefits and experiences. Use the QR code below to access your voucher and make the most of it!</p>

        <div class="qr-code">
            <p>Here is your QR code:</p>
            {!! QrCode::size(200)->generate(url('/validate-voucher/' . $vouchar->id)) !!}
                    {{-- {!! QrCode::size(200)->generate($vouchar) !!} --}}

        </div>

        <p>Thank you for choosing us! We hope you enjoy your experience.</p>

        
        <div class="footer">
            <p>Best Regards,<br>Mundrankan</p>
        </div>
    </div>
</body>

</html>
