<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Voucher Purchase</title>
</head>

<body>
    <h1>Congratulations!</h1>
    <p>You have successfully purchased the voucher: <strong>{{ $vouchar->vouchar_name }}</strong>.</p>
    <p>Here is your QR code:</p>
    <?php
        use SimpleSoftwareIO\QrCode\Facades\QrCode;
        // QrCode::format('png')->size(300)->generate(url('/vouchar/' . $voucharId), public_path($qrCodePath));
    ?>
    <div style="text-align: center;">
        {!! QrCode::size(200)->generate($vouchar) !!}
    </div>
    <p>Thank you for your purchase!</p>
</body>

</html>