<?php
session_start();
error_reporting(0);
include 'connection.php';
$find_duplicate = false;
$registered = false;
$wrong_login = false;
if(isset($_POST['signup_button'])){
    
    $postcode = $_POST["postcode"];
    $selection = $_POST["select"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
 
    
    $find_duplicate = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    
    $get_email = mysqli_query($connect, $find_duplicate);

    if(mysqli_num_rows($get_email)>0){
        $find_duplicate = true;
    }
    else{
        $registered = true;
        $account = "INSERT INTO `users`(`email`,`password`) VALUES('$email','$password')";
        $details = "INSERT INTO `details`(`postcode`,`selection`,`phone`) VALUES($postcode,'$selection','$phone')";
        
        $insert_account = mysqli_query($connect,$account);
        $insert_details = mysqli_query($connect,$details);
    }
    }

    if(isset($_POST['login_button'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $login_user = "SELECT email FROM users WHERE BINARY email = '$email' AND password = '$password'";

        $login_user_query = mysqli_query($connect, $login_user);
        if(mysqli_num_rows($login_user_query)>0){
            session_start();
            $get_data = "SELECT * FROM details WHERE id = 1 LIMIT 1";
            $get_data_query = mysqli_query($connect, $get_data);
            $get_all_data = mysqli_fetch_assoc($get_data_query);
            
            
            $_SESSION['postcode'] = $get_all_data['postcode'];
            $_SESSION['email'] = $get_all_data['email'];
            header('Location: php/user_input.php');
        }
        else{
            $wrong_login = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .disclaimer{
        display: none;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/animation.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Libero Ver 3.0 Back-PHP</title>
</head>

<body>
    <div class="container_master">
        <div class="container" id="back_to_head">
    
            <div class="head_master">
                <div class="header_container">

                    <div class="drawer_container">
                        <div class="drawer_holder">
                            <div class="drawer_lines"></div>
                            <div class="drawer_lines"></div>
                            <div class="drawer_lines"></div>
                        </div>

                    </div>
                    <div class="logo_container">
                        <div class="logo_image_container">
                            <img src="assets/images/libero.png" alt="logo libero">
                        </div>
                    </div>
                    <div class="navigations_container">
                        <ul>
                            <li><a href="#">HOME</a></li>
                            <li><a href="#">NEWS</a></li>
                            <li><a href="#">EVENTS</a></li>
                            <li><a href="#">WORLD</a></li>
                        </ul>
                    </div>
                    <div class="search_bar_container">
                        <div class="search_holder">
                            <div class="big_circle">
                                <div class="small_circle"></div>
                            </div>
                            <div class="search_handle"></div>
                        </div>
                    </div>
                    <div class="search_now_container">
                        <div class="search_now_holder">
                            <div class="two_search_container">
                                <div class="search_input_container">
                                    <div class="search_input_holder">
                                        <input type="text" id="search_item" placeholder="Search Cebu place postcode">
                                    </div>
                                </div>
                                <div class="search_close_button">
                                    <div class="search_close_button_holder">
                                        <ion-icon name="close-circle-outline"></ion-icon>
                                    </div>
                                </div>
                            </div>
                            <div class="search_button">
                                <div class="search_button_container">
                                    <div class="search_button_holder">
                                        Submit
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="drawer_background_color_holder">
                        <div class="drawer_title_close_container">
                            <div class="drawer_close_button_holder">
                                <div class="drawer_close_button">
                                    <ion-icon name="close-circle-outline"></ion-icon>
                                </div>
                            </div>
                            <div class="drawer_title_holder">
                                Change Theme Color
                            </div>
                        </div>
                        <div class="search_change_colors_container">
                            <div class="drawer_change_color_container">
                                <div class="drawer_change_color_box1"></div>
                            </div>
                            <div class="drawer_change_color_container">
                                <div class="drawer_change_color_box2"></div>
                            </div>
                            <div class="drawer_change_color_container">
                                <div class="drawer_change_color_box3"></div>
                            </div>
                            <div class="drawer_change_color_container">
                                <div class="drawer_change_color_box4"></div>
                            </div>
                            <div class="drawer_change_color_container">
                                <div class="drawer_change_color_box5"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_master">
                    
                        <div class="wrong_credential" style="color: red; z-index: <?php 
                            if($wrong_login == true){
                                echo '1';
                            }else{
                                echo '-1';
                            }
                            ?>"><?php
                                if($wrong_login == true){
                                    echo 'Wrong email or password!';
                                }
                            ?>
                        </div>
                        <div class="error" style="color: red; z-index: <?php 
                            if($find_duplicate == true){
                                echo '1';
                            }else{
                                echo '-1';
                            }
                            ?>"><?php
                                if($find_duplicate == true){
                                    echo 'Email already exist!';
                                }
                            ?>
                        </div>
                        <div class="registered" style="color: red; z-index: <?php 
                        if($registered == true) {
                            echo '1';
                            $find_duplicate = false;
                        }
                        ?>"><?php
                            if($registered == true){
                                echo 'Successfully Registered!';
                                $postcode = "";
                                $phone = "";
                                $email = "";
                                $password = "";
                            }
                        ?></div>
                    <div class="left_main_container">
                        <div class="center_line"></div>
                        <div class="register_main_container"  id="register_form">
                            <div class="main_left_header_title_container">
                                <h1>How do you feel about recycling?
                                    <div>Sign up below</div>
                                </h1>
                            </div>
                            <form action="" method="POST" class="register_form">
                                <div class="main_left_postcode_container">
                                    <div class="postcode_label">Postcode:</div>
                                    <div class="postcode_input_container">
                                        <input type="number" name="postcode" id="postcode" value="<?php echo $postcode; ?>" min="6000" max="6053" title="Only Cebu Postcode" required="required">
                                    </div>
                                </div>
                                <div class="main_left_parag">
                                    <span>Should the government start enforcing garbage separation and recycling schemes across your area?</span>
                                </div>
                                <div class="main_left_radio_container">
                                    <div class="main_radio_buttons">
                                        <label>
                                        <input type="radio" name="select" value="yes" id="yes" required value="<?php echo $selection;?>">
                                        <div class="radio_bg">
                                            <span class="radio_select">Yes</span>
                                        </div>
                                        <div class="radio_circles">
                                            <div class="radio_circle"></div>
                                        </div>
                                        </label>
                                    </div>
                                    <div class="main_radio_buttons">
                                        <label>
                                        <input type="radio" name="select" value="no" id="no" required title="REQUIRED!">
                                        <div class="radio_bg">
                                            <span class="radio_select">No&nbsp;</span>
                                        </div>
                                        <div class="radio_circles">
                                            <div class="radio_circle"></div>
                                        </div>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="email_phone_container">
                                    
                                    <div class="phone">
                                        <div class="ep_label">
                                            Phone number:
                                        </div>
                                        <input type="number" name="phone" id="phone" value="<?php echo $phone; ?>" max="09999999999" required title="Ex: 09xxxxxxxx">
                                    </div>
                                    <div class="email">
                                        <div class="ep_label">
                                            Email-Address:
                                        </div>
                                        <input type="email" name="email" id="email" required value="<?php echo $email; ?>">
                                    </div>
                                    <div class="password">
                                        <div class="ep_label">
                                            Password:
                                        </div>
                                        <input type="password" name="password" id="password" required value="<?php echo $password; ?>">
                                    </div>
                                    <div class="cpassword">
                                        <div class="ep_label">
                                            Retype-Password:
                                        </div>
                                        <input type="password" name="cpassword" id="cpassword"   required oninput="check_pass()">
                                        <p class="password_not_match_message"></p>
                                    </div>
                                </div>
                                
                                
                                <div class="submit_button_container">   
                                    <input type="submit" name="signup_button" value="Register" class="submit_button register_submit_button">
                                <div class="note">
                                    Note: Make sure to select Yes or No to proceed.
                                </div>
                                    <p class="click_to_login_container">Already have an account? <a href="#login_form" class="click_to_login">Signin</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="login_main_container"  id="login_form">
                            <form action="" method="POST" class="login_form" id="login_form">
                                
                            <div class="main_left_header_title_container">
                                <h1>Sign in to Libero</h1>
                            </div>
                                <div class="email_phone_container">
                                    <div class="email">
                                        <div class="ep_label">
                                            Email-Address:
                                        </div>
                                        <input type="email" name="email" id="email" required>
                                    </div>
                                    <div class="password">
                                        <div class="ep_label">
                                            Password:
                                        </div>
                                        <input type="password" name="password" id="password" required>
                                    </div>
                                </div>
                                
                                <div class="submit_button_container">   
                                    <input type="submit" name="login_button" value="Login" class="submit_button login_submit_button">
                                    <p class="click_to_login_container">Don't have an account? <a href="#register_form" class="click_to_signup">Create Account</a></p>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="right_main_container">
                        <div class="right_main_contents">
                            <div class="right_main_title_container">
                                <h3>Phasellus augue sapien</h3>
                            </div>
                            <div class="image_container_master">
                                <div class="right_main_image_container">
                                    <div class="right_main_line"></div>
                                    <div class="image_container">
                                        <img src="assets/images/1b.jpeg" alt="image1">
                                        <div class="image_title">
                                            <span>Vestibulum sit amet tempor orci</span>
                                        </div>
                                        <div class="readmore_container">
                                            <span>Readmore <b>>></b></span>
                                        </div>
                                    </div>

                                    <div class="right_main_parag_container">
                                        <span>Phasellus augue sapien, aliquam sit amet mauris</span>
                                    </div>
                                </div>
                                <div class="right_main_image_container">
                                    <div class="right_main_line"></div>
                                    <div class="image_container">
                                        <img src="assets/images/1c.jpeg" alt="image1">
                                        <div class="image_title">
                                            <span>Vestibulum sit amet tempor orci</span>
                                        </div>
                                        <div class="readmore_container">
                                            <span>Readmore <b>>></b></span>
                                        </div>
                                    </div>

                                    <div class="right_main_parag_container">
                                        <span>Sed facilisis volutpat turpis eu viverra</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_master">
                    <div class="footer_container">
                        <div class="footer_contents_container">
                            <div class="footer_title">Rutrum</div>
                            <div class="footer_line"></div>
                            <div class="footer_items">
                                <div class="footer_item">Fermentum</div>
                                <div class="footer_item">Neque</div>
                                <div class="footer_item">Consequat</div>
                            </div>
                        </div>
                        <div class="footer_contents_container">
                            <div class="footer_title">Malesuada</div>
                            <div class="footer_line"></div>
                            <div class="footer_items">
                                <div class="footer_item">Tellus</div>
                                <div class="footer_item">Condimentum</div>
                                <div class="footer_item">Consectetur</div>
                            </div>
                        </div>
                        <div class="footer_contents_container">
                            <div class="footer_title">Pellentesque</div>
                            <div class="footer_line"></div>
                            <div class="footer_items">
                                <div class="footer_item">Habitant</div>
                                <div class="footer_item">Morbi</div>
                                <div class="footer_item">Tristique</div>
                            </div>
                        </div>
                        <div class="footer_contents_container">
                            <div class="footer_title">Quisque</div>
                            <div class="footer_line"></div>
                            <div class="footer_items">
                                <div class="footer_item">Pharetra</div>
                                <div class="footer_item">Volutpat</div>
                                <div class="footer_item">Tristique</div>
                            </div>
                        </div>
                        <div class="footer_contents_container">
                            <div class="circle_and_item">
                                <div class="circles"></div>
                                <div class="items">Phasellus</div>
                            </div>
                            <div class="circle_and_item">
                                <div class="circles"></div>
                                <div class="items">Augue</div>
                            </div>
                            <div class="circle_and_item">
                                <div class="circles"></div>
                                <div class="items">Sapien</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/js.js"></script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        </script>
</body>

</html>