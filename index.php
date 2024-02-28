<?php
require './config/mail-config.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Include required PHPMailer files
require 'phpmail/includes/PHPMailer.php';
require 'phpmail/includes/SMTP.php';
require 'phpmail/includes/Exception.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="./images/ico/favicon.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js">
    </script>

    <style>
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('./images/logo.png') center no-repeat #fff;
        }
    </style>
    <title>Form</title>
</head>

<body>
    <div class="se-pre-con"></div>
    <!-- Save -->
    <div class="d-none">
        <?php
        if (isset($_POST['submit'])) {

            $user_dated = date('d/m/Y H:i:s');

            $user_semester_1 = $_POST['user_semester_1'];
            $user_semester_2 = $_POST['user_semester_2'];
            $semester_year = $_POST['semester_year'];

            if ($_POST['tile'] == 'Other') {
                $title = $_POST['title_name'];
            } else {
                $title = $_POST['title'];
            }
            $user_firstname = $_POST['user_firstname'];
            $user_middlename = $_POST['user_middlename'];
            $user_lastname = $_POST['user_lastname'];
            $user_dateofbirth = $_POST['user_dateofbirth'];
            $user_age = $_POST['user_age'];
            $user_nationality = $_POST['user_nationality'];
            $user_religion = $_POST['user_religion'];
            $user_telephone = "'" . $_POST['user_telephone'];
            $user_mobile = "'" . $_POST['user_mobile'];
            $user_email = $_POST['user_email'];
            $user_crrent_mailing_address = $_POST['user_crrent_mailing_address'];
            $user_citizenship = $_POST['user_citizenship'];
            $user_country_of_birth = $_POST['user_country_of_birth'];
            $user_passport_number = $_POST['user_passport_number'];
            $user_country_of_issuance_of_the_passport = $_POST['user_country_of_issuance_of_the_passport'];
            $user_name_of_home_university = $_POST['user_name_of_home_university'];

            if ($_POST['user_program'] == 'other') {
                $user_program = $_POST['user_program_other'];
            } else {
                $user_program = $_POST['user_program'];
            }
            $year_of_admission = $_POST['year_of_admission'];
            $user_englisth_first = $_POST['user_englisth_first'];

            if ($_POST['user_english_proficiency'] == 'other') {
                $user_english_proficiency = $_POST['user_english_proficiency_other'];
            } else {
                $user_english_proficiency = $_POST['user_english_proficiency'];
            }
            $user_score_english = $_POST['user_score_english'];
            $user_major = $_POST['user_major'];

            // file uplaod

            if (isset($_FILES['user_high_school_transcript']['name'])) {
                $user_high_school_transcript = $_FILES['user_high_school_transcript']['name'];

                if ($user_high_school_transcript != "") {
                    $tmp = explode('.', $user_high_school_transcript);
                    $ext = end($tmp);

                    $user_high_school_transcript = "user_high_school_transcript_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_high_school_transcript']['tmp_name'];

                    $destination_path = "images/user_high_school_transcript/" . $user_high_school_transcript;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_school']['name'])) {
                $user_school = $_FILES['user_school']['name'];

                if ($user_school != "") {
                    $tmp = explode('.', $user_school);
                    $ext = end($tmp);

                    $user_school = "user_school_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_school']['tmp_name'];

                    $destination_path = "images/user_school/" . $user_school;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_bio_data']['name'])) {
                $user_bio_data = $_FILES['user_bio_data']['name'];

                if ($user_bio_data != "") {
                    $tmp = explode('.', $user_bio_data);
                    $ext = end($tmp);

                    $user_bio_data = "user_bio_data_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_bio_data']['tmp_name'];

                    $destination_path = "images/user_bio_data/" . $user_bio_data;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_medical_certificate']['name'])) {
                $user_medical_certificate = $_FILES['user_medical_certificate']['name'];

                if ($user_medical_certificate != "") {
                    $tmp = explode('.', $user_medical_certificate);
                    $ext = end($tmp);

                    $user_medical_certificate = "user_medical_certificate_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_medical_certificate']['tmp_name'];

                    $destination_path = "images/user_medical_certificate/" . $user_medical_certificate;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_official_transcript']['name'])) {
                $user_official_transcript = $_FILES['user_official_transcript']['name'];

                if ($user_official_transcript != "") {
                    $tmp = explode('.', $user_official_transcript);
                    $ext = end($tmp);

                    $user_official_transcript = "user_official_transcript_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_official_transcript']['tmp_name'];

                    $destination_path = "images/user_official_transcript/" . $user_official_transcript;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_letter_of_recommendation']['name'])) {
                $user_letter_of_recommendation = $_FILES['user_letter_of_recommendation']['name'];

                if ($user_letter_of_recommendation != "") {
                    $tmp = explode('.', $user_letter_of_recommendation);
                    $ext = end($tmp);

                    $user_letter_of_recommendation = "user_letter_of_recommendation_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_letter_of_recommendation']['tmp_name'];

                    $destination_path = "images/user_letter_of_recommendation/" . $user_letter_of_recommendation;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_proof_proficiency']['name'])) {
                $user_proof_proficiency = $_FILES['user_proof_proficiency']['name'];

                if ($user_proof_proficiency != "") {
                    $tmp = explode('.', $user_proof_proficiency);
                    $ext = end($tmp);

                    $user_proof_proficiency = "user_proof_proficiency_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_proof_proficiency']['tmp_name'];

                    $destination_path = "images/user_proof_proficiency/" . $user_proof_proficiency;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_health_insurance']['name'])) {
                $user_health_insurance = $_FILES['user_health_insurance']['name'];

                if ($user_health_insurance != "") {
                    $tmp = explode('.', $user_health_insurance);
                    $ext = end($tmp);

                    $user_health_insurance = "user_health_insurance_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_health_insurance']['tmp_name'];

                    $destination_path = "images/user_health_insurance/" . $user_health_insurance;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            if (isset($_FILES['user_application_fee']['name'])) {
                $user_application_fee = $_FILES['user_application_fee']['name'];

                if ($user_application_fee != "") {
                    $tmp = explode('.', $user_application_fee);
                    $ext = end($tmp);

                    $user_application_fee = "user_application_fee_" . date('dmYHis') . "_" . rand(000000000, 99999999) . '.' . $ext;
                    $source_path = $_FILES['user_application_fee']['tmp_name'];

                    $destination_path = "images/user_application_fee/" . $user_application_fee;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if (!$upload) {
                        $msg = "<div class='alert alert-danger'>เกิดข้อผิดพลาดในการอัปโหลดไฟล์ </div>";
                        die();
                    }
                }
            }

            $hosting_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

            $user_high_school_transcript = "$hosting_link/images/user_high_school_transcript/$user_high_school_transcript";
            $user_school = "$hosting_link/images/user_school/$user_school";
            $user_bio_data = "$hosting_link/images/user_bio_data/$user_bio_data";
            $user_medical_certificate = "$hosting_link/images/user_medical_certificate/$user_medical_certificate";
            $user_official_transcript = "$hosting_link/images/user_official_transcript/$user_official_transcript";
            $user_letter_of_recommendation = "$hosting_link/images/user_letter_of_recommendation/$user_letter_of_recommendation";
            $user_proof_proficiency = "$hosting_link/images/user_proof_proficiency/$user_proof_proficiency";
            $user_health_insurance = "$hosting_link/images/user_health_insurance/$user_health_insurance";
            $user_application_fee = "$hosting_link/images/user_application_fee/$user_application_fee";

            $url = 'https://script.google.com/macros/s/AKfycbyBPW-jBLpxro0Sw3ccwshoLQZACTNIGVzFIXxBXA1FcMqkSRKIHhO7w-l25xGyAwKy/exec?action=addUser';

            $ch = curl_init($url);

            $jsonData = array(
                'user_dated' => $user_dated,
                'user_semester_1' => $user_semester_1,
                'user_semester_2' => $user_semester_2,
                'semester_year' => $semester_year,
                'title' => $title,
                'user_firstname' => $user_firstname,
                'user_middlename' => $user_middlename,
                'user_lastname' => $user_lastname,
                'user_dateofbirth' => $user_dateofbirth,
                'user_age' => $user_age,
                'user_nationality' => $user_nationality,
                'user_religion' => $user_religion,
                'user_telephone' => $user_telephone,
                'user_mobile' => $user_mobile,
                'user_email' => $user_email,
                'user_crrent_mailing_address' => $user_crrent_mailing_address,
                'user_citizenship' => $user_citizenship,
                'user_country_of_birth' => $user_country_of_birth,
                'user_passport_number' => $user_passport_number,
                'user_country_of_issuance_of_the_passport' => $user_country_of_issuance_of_the_passport,
                'user_name_of_home_university' => $user_name_of_home_university,
                'user_program' => $user_program,
                'year_of_admission' => $year_of_admission,
                'user_englisth_first' => $user_englisth_first,
                'user_english_proficiency' => $user_english_proficiency,
                'user_score_english' => $user_score_english,
                'user_major' => $user_major,
                'user_high_school_transcript' => $user_high_school_transcript,
                'user_school' => $user_school,
                'user_bio_data' => $user_bio_data,
                'user_medical_certificate' => $user_medical_certificate,
                'user_official_transcript' => $user_official_transcript,
                'user_letter_of_recommendation' => $user_official_transcript,
                'user_proof_proficiency' => $user_proof_proficiency,
                'user_health_insurance' => $user_health_insurance,
                'user_application_fee' => $user_application_fee
            );

            $jsonDataEncoded = json_encode($jsonData);

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $result = curl_exec($ch);
            if ($result) {
                // header('Location:index.php');
                function get_client_ip()
                {
                    $ipaddress = '';
                    if (getenv('HTTP_CLIENT_IP'))
                        $ipaddress = getenv('HTTP_CLIENT_IP');
                    else if (getenv('HTTP_X_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    else if (getenv('HTTP_X_FORWARDED'))
                        $ipaddress = getenv('HTTP_X_FORWARDED');
                    else if (getenv('HTTP_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    else if (getenv('HTTP_FORWARDED'))
                        $ipaddress = getenv('HTTP_FORWARDED');
                    else if (getenv('REMOTE_ADDR'))
                        $ipaddress = getenv('REMOTE_ADDR');
                    else
                        $ipaddress = 'UNKNOWN';
                    return $ipaddress;
                }
                $file = new SplFileObject('file.csv', 'a');
                $data_nows = date('d/m/Y H:i:s');
                $data_ip = get_client_ip();
                $file->fputcsv(array($data_nows, $data_ip));
                $file = null;

                // Mail
                $subj = "มีผู้ลงทะเบียนใหม่กับทางระบบ BUI Bangkok university International";
                $message = "พบผู้ลงทะเบียนใหม่กับทางระบบ <br>
        กรุณาตรวจสอบข้อมูลได้ที่ <br>
         <a href=\"https://docs.google.com/spreadsheets/d/10fGk6KSP-7u_zow4nou4z-Z2VF-Fsqx1H4HFlStbWTo/edit?usp=sharing\">คลิกที่นี่</a><br>";
                //Create instance of PHPMailer
                $mail = new PHPMailer(true);
                //Set mailer to use smtp
                $mail->CharSet = "utf-8";
                $mail->SMTPDebug = 0;
                $mail->isSMTP();

                //Define smtp host
                $mail->Host = $my_host;
                //Enable smtp authentication
                $mail->SMTPAuth = true;
                //Set smtp encryption type (ssl/tls)
                $mail->SMTPSecure = "tls";
                //Port to connect smtp
                $mail->Port = $my_port;

                // authen smtp
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                    ),
                );

                //Set gmail username
                $mail->Username = $my_username_email;
                //Set gmail password
                $mail->Password = $my_pass;
                //Email subject
                $mail->Subject = $subj;
                //Set sender email
                $mail->From = $my_from;
                $mail->FromName = "BUI Bangkok university International";
                //Enable HTML
                $mail->isHTML(true);
                //Attachment
                //Email body
                $mail->Body = $message;
                //Add recipient
                $names = 'BUI Admin';
                $mail->addAddress($u_email, $u_email);
                //Finally send email
                if ($mail->send()) {
                    $msg = "<div class=\"alert alert-success\">Register has been successfully</div>";
                } else {
                    $msg = "<div class=\"alert alert-success\">Register has been Fail</div>";
                }
            }
        }
        ?>
    </div>
    <!-- Save -->
    <div class="container">
        <img id="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRz3l1cULB2u2wsjmLtvVuwZyzfvQKBWKs6s0im69VTR41XUuxG4gkxF9w0_7jn4gsI7qs&usqp=CAU" width="300" height="150" />
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <form action="" method="post" name="form" class="p-5 Card" enctype="multipart/form-data">

            <div class="p-5 Card">

                <div class="card-header">
                    <p><b>Semester</b></p>
                </div>

                <div class="row card-body">

                    <div class="form-group col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Fall Semester (August - December)" id="user_semester_1" name="user_semester_1" value="Fall Semester (August - December)">
                            <label class="form-check-label" for="user_semester_1">
                                Fall Semester (August - December)
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Spring Semester (Jannuary - May)" id="user_semester_2" name="user_semester_2" value=" Spring Semester (Jannuary - May)">
                            <label class="form-check-label" for="user_semester_2">
                                Spring Semester (Jannuary - May)
                            </label>
                        </div>
                    </div>

                    <div class="form-group col">
                        <input type="text" class="form-control" name="semester_year" id="datepicker" />Year
                    </div>
                </div>
            </div>

            <div class="p-5 Card">

                <div class="card-header">
                    <p><b>Personal Details</b></p>
                </div>


                <div class="row card-body">

                    <div class="form-group col">
                        <label for="title_1">Title</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="title" id="title_1" value="Mr." required>
                            <label class="form-check-label" for="title_1" name="title">Mr.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="title" id="title_2" value="Miss">
                            <label class="form-check-label" for="titleradio2" name="title_2">Miss</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="title" id="title_3" value="Other">
                            <label class="form-check-label" for="title_3" name="title">Other</label>
                            <input type="text" class="form-control" id="title_name" placeholder="Please specify" name="title_name">
                        </div>

                    </div>
                    <br>


                    <div class="form-group col">
                        <label for="user_firstname">First Name</label>
                        <input type="text" class="form-control" id="user_firstname" placeholder="First Name" name="user_firstname">
                    </div>
                    <br>

                    <div class="form-group col">
                        <label for="user_middlename">Middle Name</label>
                        <input type="text" class="form-control" id="user_middlename" placeholder="Middle Name" name="user_middlename">
                    </div>
                    <br>

                    <div class="form-group col">
                        <label for="user_lastname">Last Name</label>
                        <input type="text" class="form-control" id="user_lastname" placeholder="Last Name" name="user_lastname">
                    </div>

                </div>
                <br>

                <div class="row card-body">

                    <div class="form-group col">
                        <label for="user_dateofbirth">Date of Birth (Month/Date/Year)</label><br>
                        <input placeholder="Select date" type="date" id="user_dateofbirth" class="form-control" name="user_dateofbirth">
                    </div>
                    <br>

                    <div class="form-group col">
                        <label for="user_age">Age</label>
                        <input type="text" class="form-control" id="user_age" placeholder="Age" name="user_age">
                    </div>


                    <div class="form-group col">
                        <label for="user_nationality">Nationality</label>
                        <input type="text" class="form-control" id="user_nationality" placeholder="Nationality" name="user_nationality">
                    </div>
                    <br>

                    <div class="form-group col">
                        <label for="user_religion">Religion</label>
                        <input type="text" class="form-control" id="user_religion" placeholder="Religion" name="user_religion">
                    </div>
                    <br>

                </div>
                <br>

                <div class="row card-body">

                    <div class="form-group col">
                        <label for="user_telephone">Telephone</label>
                        <input type="text" class="form-control" id="user_telephone" placeholder="Telephone Number" name="user_telephone">
                    </div>
                    <br>


                    <div class="form-group col">
                        <label for="user_mobile">Mobile</label>
                        <input type="text" class="form-control" id="user_mobile" placeholder="Mobile" name="user_mobile">
                    </div>
                    <br>

                    <div class="form-group col">
                        <label for="user_email">E-mail</label>
                        <input type="email" class="form-control" id="user_email" placeholder="E-mail" name="user_email">
                    </div>
                    <br>


                </div>
                <br>

                <div class="row card-body">

                    <div class="form-group col">
                        <label for="user_crrent_mailing_address">Current Mailing Address</label>
                        <input type="text" class="form-control" id="user_crrent_mailing_address" placeholder="Current Mailing Address" name="user_crrent_mailing_address">
                    </div>
                    <br>


                    <div class="form-group col">
                        <label for="user_citizenship">Country of Citizenship(as on passport or National ID Card)</label>
                        <input type="text" class="form-control" id="user_citizenship" placeholder="Citizenship ID" name="user_citizenship">
                    </div>
                    <br>



                </div>
                <br>

                <div class="row card-body">
                    <div class="form-group col">
                        <label for="user_country_of_birth">Country of Birth</label>
                        <input type="text" class="form-control" id="user_country_of_birth" placeholder="Country of Birth" name="user_country_of_birth">
                    </div>

                    <div class="form-group col">
                        <label for="user_passport_number">Passport Number</label>
                        <input type="text" class="form-control" id="user_passport_number" placeholder="Passport Number" name="user_passport_number">
                    </div>
                    <br>
                    <div class="form-group col">
                        <label for="user_country_of_issuance_of_the_passport">Country of issuance of the Passport</label>
                        <input type="text" class="form-control" id="user_country_of_issuance_of_the_passport" placeholder="Passport Number" name="user_country_of_issuance_of_the_passport">
                    </div>

                </div>
            </div>

            <div class="p-5 Card">

                <div class="card-header">
                    <p><b>Education (Highest level of education complete)</b></p>
                </div>

                <div class="row card-body">

                    <div class="form-group col">

                        <label for="user_name_of_home_university">Name of Home University</label>
                        <input type="text" class="form-control" id="user_name_of_home_university" placeholder="Name of Home University" name="user_name_of_home_university">

                    </div>

                    <div class="form-group col">

                        <label for="user_program">Program</label>
                        <select class="form-select" aria-label="Default select example" id="user_program" name="user_program" required>
                            <option value=""></option>
                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                            <option value="Master’s Degree">Master’s Degree</option>
                            <option value="Doctoral Degree">Doctoral Degree</option>
                        </select>

                    </div>


                    <div class="form-group col">

                        <label for="year_of_admission">Year of Admission</label>
                        <input type="text" class="form-control datepicker" id="year_of_admission" placeholder="Year of Admission" name="year_of_admission">

                    </div>

                </div>

            </div>


            <div class="p-5 Card">

                <div class="card-header">

                    <p><b><u>English language Proficiency Infomation</u></b></p>
                    <p><b>Plase check the appropriate boxes.</b></p>
                    <p>You must provide documentary evidence of your English language Proficiency test score.</p>

                </div>



                <div class="row card-body">

                    <div class="form-group col">
                        <label>1) English is my first language</label>
                        <br>
                        <input class="form-check-input" type="radio" name="user_englisth_first" id="user_englisth_first1" value="Yes">
                        <label class="form-check-label" for="user_englisth_first1">
                            Yes
                        </label>
                        <br>
                        <input class="form-check-input" type="radio" name="user_englisth_first" id="user_englisth_first2" value="No">
                        <label class="form-check-label" for="user_englisth_first2">
                            No
                        </label>
                    </div>
                </div>

                <br>

                <div class="row card-body">
                    <div class="form-group col">
                        <label>2) English proficiency test</label>
                        <br>
                        <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency1" value="IELTS">
                        <label class="form-check-label" for="user_english_proficiency1">
                            IELTS
                        </label>
                        &nbsp;
                        <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency2" value="TOEFL">
                        <label class="form-check-label" for="user_english_proficiency2">
                            TOEFL
                        </label>
                        &nbsp;
                        <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency3" value="CU-TEP">
                        <label class="form-check-label" for="user_english_proficiency3">
                            CU-TEP
                        </label>
                        &nbsp;
                        <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency4" value="SAT (Critical and Mathematics)">
                        <label class="form-check-label" for="user_english_proficiency4">
                            SAT (Critical and Mathematics)
                        </label>
                        <br>
                        <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency5" value="Other" name="englishtest">
                        <label class="form-check-label" for="user_english_proficiency5">
                            Other, specify
                        </label>
                        <input type="text" class="form-control" id="user_english_proficiency_other" placeholder="Other,specify" name="user_english_proficiency_other" value="Other">
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label for="user_score_english">Score of</label>
                                <input type="text" class="form-control" id="user_score_english" placeholder="Score" name="user_score_english">
                            </div>
                        </div>


                    </div>

                </div>

            </div>

            <div class="p-5 Card">

                <div class="card-header">
                    <p><b>Major/Course Preferences</b></p>
                </div>


                <div class="row card-body">
                    <div class="form-group col">

                        <select class="form-select" aria-label="Default select example" name="user_major" id="user_major">
                            <option selected>Major/Course</option>
                            <option value="I022 Marketing">I022 Marketing</option>
                            <option value="I033 Communication Strategy and Ideation">I033 Communication Strategy and Ideation</option>
                            <option value="I051 Business English">I051 Business English</option>
                            <option value="I059 International Tourism Hospitality Mgt.">I059 International Tourism Hospitality Mgt.</option>
                            <option value="I086 Digital Media and Design">I086 Digital Media and Design</option>
                            <option value="I058 Culinary Arts and Design">I058 Culinary Arts and Design</option>
                            <option value="D052 Thai (Thai Program)">D052 Thai (Thai Program)</option>
                            <option value="I032 Innovative Media Production">I032 Innovative Media Production</option>
                            <option value="I120 Entrepreneurship">I120 Entrepreneurship</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="p-5 Card">

                <div class="card-header">
                    <p><b><u>Application documents</u></b></p>
                    <p>For any certificates or transcripts not written in English or Thai, please submit an English translation certified by the educational institution.</p>
                </div>


                <div class="row card-body">
                    <div class="form-group col">
                        <div class="mb-5">
                            <label for="user_high_school_transcript" class="form-label">High school transcript</label>
                            <input type="file" name="user_high_school_transcript" id="user_high_school_transcript" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_school" class="form-label">High school diploma</label>
                            <input type="file" name="user_school" id="user_school" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_bio_data" class="form-label">Bio Data Page of the Passport</label>
                            <input type="file" name="user_bio_data" id="user_bio_data" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_medical_certificate" class="form-label">Medical certificate (ability to
                                study)</label>
                            <input type="file" name="user_medical_certificate" id="user_medical_certificate" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_official_transcript" class="form-label">Official transcript of grades from
                                current university/educational institution</label>
                            <input type="file" name="user_official_transcript" id="user_official_transcript" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_letter_of_recommendation" class="form-label">A letter of recommendation
                                from the current university/educational institution</label>
                            <input type="file" name="user_letter_of_recommendation" id="user_letter_of_recommendation" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_proof_proficiency" class="form-label">Proof of English proficiency</label>
                            <input type="file" name="user_proof_proficiency" id="user_proof_proficiency" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_health_insurance" class="form-label">A copy of health insurance covering
                                the period of stay in Thailand</label>
                            <input type="file" name="user_health_insurance" id="user_health_insurance" class="form-control" required>
                        </div>
                        <div class="mb-5">
                            <label for="user_application_fee" class="form-label">Application fee of US $53 (Not required
                                for exchange students under the MOU)</label>
                            <input type="file" name="user_application_fee" id="user_application_fee" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <p class="lead">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I certify
                    that the informaition provided in this
                    application is complete and accurate. I understand that making false statements, (providing
                    incorrect information, or violating any university's rules and regulations may result in the denial
                    of my admission)</p>
                <br>
                <p class="lead">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I hereby
                    agree and consent that the Bangkok University may collect, use, process and disclose my personal
                    data,
                    provided in this form or collected from other people or entities by Bangkok University or its agent
                    for the purpose of admission
                    or the benefit of the Bangkok University's business. I also acknowledge, agree and consent the
                    Bangkok University has the right
                    to collect, use, process and disclose my personal data to be in accordance with the Privacy Policy,
                    prescribed by Bangkok
                    University and the amendment thereof. If you would like to find out more about Privacy Policy,
                    pleace view our Privacy Policy
                    at https://pdpa.bu.ac.th/policy/DataPrivacyRequired?uid=3b562d825cf4414da7afbd3d6fd6a754
                </p>
            </div>


            <div class="container">
                <div class="col-md-12 text-center" id="submit-btns">

                    <input type="checkbox" id="sign" name="sign">&nbsp;&nbsp; <label for="sign">Applicant's Signature</label> <br><br>

                    <button type="submit" name="submit" id="btn-submit" value="Submit" class="btn btn-primary btn-lg" disabled>Submit</button>
                </div>

            </div>

        </form>
    </div>

    <br>




</body>
<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    })
    $(document).ready(function() {
        $(".datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    })
</script>
<script>
    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/app-control.js"></script>



</html>