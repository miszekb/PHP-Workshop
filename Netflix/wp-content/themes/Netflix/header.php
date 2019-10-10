<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="module" src="<?php echo get_template_directory_uri() . '/scripts/main.js'?>"></script>
    <title>Netflix</title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="header-container">
        <div class="upper-bar">
            <img 
                src="<?php echo get_template_directory_uri() . '/assets/Netflix_2015_logo.svg'?>" 
                alt="logo" 
                class="logo"
            >
            <button class="sign-button">Sign In</button>
        </div>
        <div class="welcome">
            <h1 class="main-promo">Unlimited movies, TV shows, and more.</h1>
            <h3 class="sub-promo">Watch anywhere. Cancel anytime.</h2>
            <button class="try-button">TRY IT NOW ></button>
        </div>
    </div>