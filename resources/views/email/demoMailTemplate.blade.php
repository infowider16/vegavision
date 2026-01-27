<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        /* Simplified CSS */
        .mail-logo {
            width: 50%;
            margin-bottom: 10px;
        }
        body, table, td {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            color: #333;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .header {
            background: #ffff;
            padding: 20px 0;
            text-align: center;
            color: black;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: black;
            margin: 0;
            padding: 0 20px;
        }

        .content {
            padding: 40px;
        }

        .text {
            font-size: 16px;
            line-height: 1.6;
            color: #4a5568;
            text-align: center;
            margin: 0 0 30px;
        }

        .button-container {
            text-align: center;
            margin: 30px 0;
        }

        .button {
            display: inline-block;
            background: rgb(255, 0, 255);;
            color: #fff !important;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            padding: 16px 45px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(118, 75, 162, 0.3);
            transition: all 0.3s ease-in;
        }

        .button:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease-out;
        }

        .divider {
            height: 1px;
            background: #e2e8f0;
            margin: 30px 0;
        }

        .footer {
            font-size: 14px;
            color: #718096;
            text-align: center;
            padding: 0 20px 30px;
        }
        .content {
            background-color: #fff;
        }

        .password-display {
            background: #f8f9fa;
            border: 1px dashed #d1d5db;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            .content {
                padding: 30px 20px;
            }

            .title {
                font-size: 24px;
            }

            .button {
                padding: 14px 35px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">
                <div class="container">
                    <table class="card" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <!-- Header -->
                        <tr>
                            <td class="header">
                                <img src="{{ asset('assets/images/vega-logo.png') }}" alt="" class="mail-logo">
                                <h1 class="title">Reset Password</h1>
                            </td>
                        </tr>

                        <!-- Content -->
                        <tr>
                            <td class="content">
                                <p class="text">Hello {{ $user->name }},</p>

                                <p class="text">We have received a request to reset your password. Here is your new temporary password:</p>

                                <div class="password-display">
                                    {{ $newPassword }}
                                </div>

                                <p class="text">Please use this password to log in to your account. We recommend changing your password immediately after logging in.</p>

                                <div class="button-container">
                                    <a href="{{ route('admin.login') }}" class="button">Login to your account</a>
                                </div>

                                <div class="divider"></div>

                                {{-- <p class="text">If you didn't request this password reset, please contact our support team immediately.</p> --}}

                                <p class="footer">© 2025 {{ env('APP_NAME', 'VegaVision') }} ALL RIGHTS RESERVED.</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>