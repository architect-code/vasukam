<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/5e4ef34fb5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="setting.css">
        <link rel="icon" type="png/image" href="../random_image/vasukam.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="setting.js" type="text/javascript" defer></script>
    </head>
    <body>
        <section class="one_top_bar">
            <div class="two_back" onclick = "go_back()">
              <i class="fas fa-arrow-left"></i>
            </div>
            
            <div class="three_heading">
                <span>Settings</span>
            </div>

        </section>
        <section class="two_main_body">
            <section class="three_general eight_main_section">
                <div class="six_heading">
                    GENERAL

                </div>
                <div class="seven_query">
                    <div onclick = "account_setting()"> <i class="fas fa-user"></i><span>Account <i class='fas fa-lock' style = 'padding-left: 1.5vw'></i></span>
                    </div>

                </div>
                <div class="seven_query">
                    <div onclick = "logout()"> <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
                    </div>

                </div>
                <div class="seven_query">
                    <div onclick = "report_bug()"> <i class="fas fa-bug"></i><span>Report Bug <i class='fas fa-lock' style = 'padding-left: 1.5vw'></i></span>
                    </div>

                </div>

            </section>
            <!-- <section class="four_about eight_main_section">
                <div class="six_heading">
                    ABOUT

                </div>
                <div class="seven_query">
                    <div>
                        <i class="fas fa-book"></i><span>Content Policy</span></div>
                        <div><i class="fas fa-user-cog"></i><span>Privacy Policy</span></div>
                        <div><i class="fas fa-file-signature"></i><span>User Agreement</span></div>
                    

                </div>

            </section>
            <section class="five_support eight_main_section">
                <div class="six_heading">
                    SUPPORT

                </div>
                <div class="seven_query">
                    <div>  <i class="fas fa-question"></i><span>Help FAQ</span></div>
                        <div> <i class="fas fa-bug"></i><span>Report a bug</span></div>
                            <div> <i class="fas fa-newspaper"></i><span>News</span></div>

                </div>

            </section> -->
<!-- 
            <section class="six_log_out eight_main_section">
                <div class="six_heading">
                    ADMIN

                </div>
                <div class="seven_query">
                    <div>  <i class="fas fa-question"></i><span>Log Out</span></div>
                        <div> <i class="fas fa-bug"></i><span>Delete Account</span></div>
                            <div> <i class="fas fa-newspaper"></i><span>News</span></div>

                </div>

            </section> -->


        </section>
    </body>