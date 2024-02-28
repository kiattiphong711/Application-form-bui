<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Bangkok University | มหาวิทยาลัยกรุงเทพ</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="./images/ico/favicon.png" />

    <!-- font-awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        .bg-preview-show {
            margin-top: 3rem;
            background-image: url('./images/bg-cover.png');
            background-position: top center;
            background-repeat: no-repeat;
            background-size: contain;
        }

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


    <!-- Custom styles for this template -->
    <link href="./css/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <div class="se-pre-con"></div>
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="https://www.bu.ac.th/th/" target="_blank"><img src="./images/logo.png" alt="Bangkok University"></a>
            </div>
        </nav>
    </header>

    <!-- Save -->
    <div class="d-none">
        <?php
        if (isset($_POST['submit'])) {

            $user_dated = date('d/m/Y H:i:s');
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

            $url = 'https://script.google.com/macros/s/AKfycbw4NbfS9Yn_guLgYgXeGSYXJBvIFOxl6RAyiO410oB3762VNnQ859WAUNPETljG-q4q/exec?action=addUser';

            $ch = curl_init($url);

            $jsonData = array(
                'user_dated' => $user_dated,
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
                $msg = "<div class=\"alert alert-success\">Register has been successfully</div>";
                // header('Location:index.php');
            }
        }
        ?>
    </div>
    <!-- Save -->
    <!-- Begin page content -->
    <main class="flex-shrink-0 mt-3 mb-3">
        <section class="py-5 text-center container-fluid bg-preview-show">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <p class="lead fw-light mt-2">
                        &nbsp;
                    </p>
                    <div class="text-center my-5">
                        &nbsp;
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div class="container px-5 my-5">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <div class="text-center mb-5">
                    <i class="far fa-file-alt fa-3x"></i>
                    <h2 class="fw-bolder">Register</h2>
                    <p class="lead mb-0">BU Study Abroad - Application Form for Exchange/Visiting Students (Semester 1/2022 - August to December 2022)</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-md-10">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Title</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="title" id="title_1" value="Mr." required>
                                    <label class="form-check-label" for="title_1">
                                        Mr.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="title" id="title_2" value="Miss">
                                    <label class="form-check-label" for="title_2">
                                        Miss
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="title" id="title_3" value="Other">
                                    <label class="form-check-label" for="title_name">
                                        Other
                                    </label>
                                    <input type="text" class="form-control" name="title_name" id="title_name">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="user_firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="user_firstname" name="user_firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_middlename" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="user_middlename" name="user_middlename">
                            </div>
                            <div class="mb-3">
                                <label for="user_lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="user_lastname" name="user_lastname" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_dateofbirth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="user_dateofbirth" name="user_dateofbirth" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="user_age" name="user_age" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="user_nationality" name="user_nationality" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" id="user_religion" name="user_religion" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_telephone" class="form-label">Telephone</label>
                                <input type="tel" class="form-control" id="user_telephone" name="user_telephone" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_mobile" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" id="user_mobile" name="user_mobile" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_crrent_mailing_address" class="form-label">Current Mailing Address</label>
                                <input type="text" class="form-control" id="user_crrent_mailing_address" name="user_crrent_mailing_address" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_citizenship" class="form-label">Country of citizenship (as on passport or National ID Card)</label>
                                <input type="text" class="form-control" id="user_citizenship" name="user_citizenship" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_country_of_birth" class="form-label">Country of Birth</label>
                                <input type="text" class="form-control" id="user_country_of_birth" name="user_country_of_birth" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_passport_number" class="form-label">Passport Number</label>
                                <input type="text" class="form-control" id="user_passport_number" name="user_passport_number" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_country_of_issuance_of_the_passport" class="form-label">Country of issuance of the Passport</label>
                                <input type="text" class="form-control" id="user_country_of_issuance_of_the_passport" name="user_country_of_issuance_of_the_passport" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_name_of_home_university" class="form-label">Name of Home University</label>
                                <input type="text" class="form-control" id="user_name_of_home_university" name="user_name_of_home_university" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Program</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_program" id="program_1" value="Bachelor's Degree" required>
                                    <label class="form-check-label" for="program_1">
                                        Bachelor's Degree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_program" id="program_2" value="Master's Degree">
                                    <label class="form-check-label" for="program_2">
                                        Master's Degree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_program" id="program_3" value="Doctoral Degree">
                                    <label class="form-check-label" for="program_3">
                                        Doctoral Degree
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_program" id="program_4" value="other">
                                    <label class="form-check-label" for="user_program_other">
                                        Other
                                    </label>
                                    <input type="text" class="form-control" id="user_program_other" name="user_program_other">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="year_of_admission" class="form-label">Year of Admission (at your Home University)</label>
                                <input type="text" class="form-control" id="year_of_admission" name="year_of_admission" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_englisth_first" class="form-label">English is my first language</label>
                                <select name="user_englisth_first" id="user_englisth_first" class="form-control" required>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="user_english_proficiency1" class="form-label">English Proficiency</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency1" value="IELTS" required>
                                    <label class="form-check-label" for="user_english_proficiency1">
                                        IELTS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency2" value="TOEFL">
                                    <label class="form-check-label" for="user_english_proficiency2">
                                        TOEFL
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency3" value="SAT">
                                    <label class="form-check-label" for="user_english_proficiency3">
                                        SAT
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user_english_proficiency" id="user_english_proficiency4" value="Other">
                                    <label class="form-check-label" for="user_english_proficiency4">
                                        Other
                                    </label>
                                    <input type="text" class="form-control" id="user_english_proficiency_other" name="user_english_proficiency_other">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="user_score_english" class="form-label">Score of the English Proficiency Test</label>
                                <input type="text" class="form-control" id="user_score_english" name="user_score_english" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_major" class="form-label">Major/Course Preferences</label>
                                <select name="user_major" id="user_major" class="form-control" required>
                                    <option value="I022">I022 Marketing</option>
                                    <option value="I033">I033 Communication Strategy and Ideation</option>
                                    <option value="I051">I051 Business English</option>
                                    <option value="I059">I059 International Tourism Hospitality Management</option>
                                    <option value="I086">I086 Digital Media and Design</option>
                                    <option value="I058">I058 Culinary Arts and Design</option>
                                    <option value="I032">I032 Innovative Media Production</option>
                                    <option value="I120">I120 Entrepreneurship</option>
                                    <option value="D052">D052 Thai (Thai Program)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="user_high_school_transcript" class="form-label">High school transcript</label>
                                <input type="file" name="user_high_school_transcript" id="user_high_school_transcript" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_school" class="form-label">High school diploma</label>
                                <input type="file" name="user_school" id="user_school" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_bio_data" class="form-label">Bio Data Page of the Passport</label>
                                <input type="file" name="user_bio_data" id="user_bio_data" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_medical_certificate" class="form-label">Medical certificate (ability to study)</label>
                                <input type="file" name="user_medical_certificate" id="user_medical_certificate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_official_transcript" class="form-label">Official transcript of grades from current university/educational institution</label>
                                <input type="file" name="user_official_transcript" id="user_official_transcript" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_letter_of_recommendation" class="form-label">A letter of recommendation from the current university/educational institution</label>
                                <input type="file" name="user_letter_of_recommendation" id="user_letter_of_recommendation" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_proof_proficiency" class="form-label">Proof of English proficiency</label>
                                <input type="file" name="user_proof_proficiency" id="user_proof_proficiency" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_health_insurance" class="form-label">A copy of health insurance covering the period of stay in Thailand</label>
                                <input type="file" name="user_health_insurance" id="user_health_insurance" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_application_fee" class="form-label">Application fee of US $53 (Not required for exchange students under the MOU)</label>
                                <input type="file" name="user_application_fee" id="user_application_fee" class="form-control" required>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer mt-auto py-1 bg-light">
        <div class="container">
            <p class="stext-107 cl6 text-center text-dark mt-3">
                Copyright © <script>
                    document.write(new Date().getFullYear() - 60);
                </script>-2022 <i class="fa fa-heart-o" aria-hidden="true"></i> Bangkok University. All rights reserved
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/app-control.js"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
</body>

</html>