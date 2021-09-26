<?php
session_start();
?>
<html lang="he" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>ASHDOD 360</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="./css/style.css?v=2" crossorigin="anonymous">
</head>
<body>
    
    <?php require './header.php'; ?>
    <div class="cont_fluid main_form">
        <div class="cont">
            <div class="ashdod_form">
                <form action="./send.php" method="POST">
                    <div class="ashdod_form_title">
                        <h2>אני רוצה לפגוש את הסיירת!</h2>
                    </div>
                    <div class="ashdod_form_inputs">
                        <div class="ashdod_input input_text">
                            <input type="text" class="full_name_input" name="full_name" placeholder="שם מלא*">
                        </div>
                        <div class="ashdod_input input_text lefty">
                            <input type="tel" class="phone_input" style="text-align:right;" name="phone" placeholder="טלפון*">
                        </div>
                        <div class="ashdod_input input_text">
                            <input type="text" class="email_input" name="email" placeholder='דוא"ל'>
                        </div>
                        <div class="ashdod_input input_datetime lefty">
                            <input type="text" placeholder="מתי נוח לי לדבר?">
                        </div>
                    </div>
                    <div class="ashdod_submit">
                        <!-- <input type="submit"> -->
                        <a href="javascript:void(0);" class="ashdod_submit_button send_form" >שליחה</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require './footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/he.js"></script>
    <script>
		nl_pos = "bl";
		nl_dir = "./nl/";
		nl_contact = "n:name|p:phone|u:email"; // website owner information
        $(function() {
            $(".input_datetime input").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minTime: "06:00",
                maxTime: "22:00",
                locale: "he",
                allowInput: false,
                disableMobile: true,
                dateFormat: "H:i d-m-Y"
            });

            $('.send_form').on('click', function(){
                var email = $('.email_input').val();
                var phone = $('.phone_input').val();
                var full_name = $('.full_name_input').val();

                if(email.length == 0) {
                    alert('יש להזין אימייל תקני');
                    return;
                }
                if(phone.length == 0) {
                    alert('יש להזין טלפון נייד או קווי');
                    return;
                }
                if(full_name.length == 0) {
                    alert('יש להזין שם מלא');
                    return;
                }

                $.ajax({
                    url: "./send.php",
                    method: 'POST',
                    data: {
                        email: email,
                        phone: phone,
                        full_name: full_name,
                    },
                    cache: false,
                    success: function(response){
                        window.location.href = "./thankyou.php";
                    },
                    error: function(error){
                        console.log('error');
                    }
                });
            });
        });
    </script>
	<script src="./nagishli.js?v=2.3" charset="utf-8" defer></script>

</body>
</html>