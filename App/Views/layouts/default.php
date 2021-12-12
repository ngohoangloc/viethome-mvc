<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?= config("app.APP_NAME") ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=request()->baseUrl();?>/assets/css/templatemo.css">
    <link rel="stylesheet" href="<?=request()->baseUrl();?>/assets/css/custom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?=request()->baseUrl();?>/assets/css/fontawesome.min.css">
    
</head>

<body>
    
    <!-- Header section -->
    <?= $this->insert('layouts/header') ?>


    <!-- Content section -->
    <?= $this->section('page') ?>

    <!-- Footer section -->
    <?= $this->insert('layouts/footer') ?>

    <?= $this->insert('layouts/logout_modal') ?>

    <!-- Start Script -->
    <script src="<?=request()->baseUrl();?>/assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?=request()->baseUrl();?>/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?=request()->baseUrl();?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=request()->baseUrl();?>/assets/js/templatemo.js"></script>
    <script src="<?=request()->baseUrl();?>/assets/js/toastr.min.js"></script>
    <script src="<?=request()->baseUrl();?>/assets/js/custom.js"></script>
    <!-- End Script -->


    <!-- Thêm thông báo Flash messages -->
    <?= $this->insert('layouts/notifications'); ?>

</body>