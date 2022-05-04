<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> @yield('title')</title>
        <link href="{{ asset('assets/css/email.css') }}" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            body {
                padding: 0;
                margin: 0;
                font-family: 'Inter', sans-serif;
                font-size: 14px
            }

            .container {
                max-width: 1000px;
                margin-left: auto;
                margin-right: auto;
                line-height: 1.5;
            }
            .header {
                background-color: #fff1f2;
                padding: 10px 0;
            }

            .content {
                padding: 30px 0
            }

            .content .signature {
                margin: 50px 0 20px;
            }

            

            .footer {
                background-color: #fff1f2;
                padding: 40px 0 50px;
                text-align: center
            }

            .footer hr {
                border-width: 2px;
            }

            .footer .socials {
                margin-bottom: 30px;
            }

            .footer .socials div {
                display: inline-block;
                margin: 5px;
            }

            .header .logo {
                height: 50px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <img class="logo" src="{{ asset('assets/media/logos/beautysecrets.png') }}" alt="">
            </div>
        </div>

        <div class="content">
            <div class="container">
                @yield('content')

                <div class="signature">
                    <div>XOXO,</div>
                    <div style="font-weight:500">Beauty Secrets</div>
                </div>
            </div>
        </div>
       
        <div class="footer">
            <div class="container">
                <div class="socials">
                    <div>
                        <a href="https://www.facebook.com/beautysecrets.mn" target="_blank">
                            <img width="35" src="{{ asset('assets/media/icons/duotone/social/soc004.svg') }}"/>
                        </a>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/beautysecrets.mn/" target="_blank">
                            <img width="35" src="{{ asset('assets/media/icons/duotone/social/soc005.svg') }}"/>
                        </a>
                    </div>
                    <div>
                        <a href="https://beautysecrets.mn" target="_blank">
                            <img width="35" src="{{ asset('assets/media/icons/duotone/Map/map004.svg') }}"/>
                        </a>
                    </div>
                </div>
                <hr>
                <div style="margin:30px 0 0 0">
                    <div>CopyRight &copy; 2022 Beauty Secrets, Бүх эрх хуулиар хамгаалагдсан.</div>
                    <div>Та Beauty Secrets-ийн и-мэйл листэд бүртгүүлсэн байна.</div>
                </div>

            </div>
        </div>
       
    </body>
</html>