<!-- resources/views/emails/status_updated.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Updated</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; margin: 0; padding: 0;">
    <div style="width: 100%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); padding: 30px; border-top: 5px solid #007bff;">
        <h1 style="color: #343a40; text-align: center; font-size: 26px; margin-bottom: 15px; font-weight: bold; text-transform: uppercase;">Hello, {{ $adminName }}</h1>

        <p style="color: #495057; line-height: 1.6; font-size: 16px; margin: 15px 0;">We hope this message finds you well. We want to inform you that your status has been successfully updated.</p>

        <p style="color: #495057; line-height: 1.6; font-size: 16px; margin: 15px 0;">Your current status is:
            <span style="font-weight: bold; font-size: 1.4em; color: {{ $status == 'approved' ? '#28a745' : ($status == 'banned' ? '#dc3545' : '#ffc107') }};">
                {{ $status }}
            </span>
        </p>

        <!-- Conditional content based on status -->
        @if ($status == 'approved')
        <p style="color: #28a745; line-height: 1.6; font-size: 16px; margin: 15px 0;">Congratulations! Your account has been approved. You can now log in to your account and explore all the features available to you.</p>
        <p style="text-align: center;">
            <a href="{{ url('/login') }}" style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 15px; transition: background-color 0.3s ease;">
                Log In Now
            </a>
        </p>
        @elseif ($status == 'banned')
        <p style="color: #dc3545; line-height: 1.6; font-size: 16px; margin: 15px 0;">We're sorry to inform you that your account has been banned. If you believe this is a mistake or need further assistance, please do not hesitate to contact us.</p>
        <p style="text-align: center;">
            <a href="{{ url('/contact') }}" style="display: inline-block; background-color: #dc3545; color: #ffffff; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-weight: bold; margin-top: 15px; transition: background-color 0.3s ease;">
                Contact Support
            </a>
        </p>
        @endif

        <p style="color: #495057; line-height: 1.6; font-size: 16px; margin: 15px 0;">If you have any questions or concerns regarding your status, please feel free to reach out to us at any time.</p>

        <div style="margin-top: 30px; text-align: center; font-size: 0.9em; color: #868e96; border-top: 1px solid #dcdcdc; padding-top: 15px;">
            <p>Thank you for being a valued member of our community!</p>
            <p>Best regards,</p>
            <p style="font-weight: bold;">The Admin Team</p>
        </div>
    </div>
</body>

</html>