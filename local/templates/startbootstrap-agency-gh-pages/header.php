<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); //Защита от подключения файла напрямую без подключения ядра


use Bitrix\Main\Page\Asset;
  

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/assets/favicon.ico" />
       
        <?php
            $asset = Asset::getInstance();
            $asset->addCss(SITE_TEMPLATE_PATH . "/css/styles.css");
            $asset->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com/css?family=Montserrat:400,700");
            $asset->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700");
            $asset->addJs(SITE_TEMPLATE_PATH . "https://use.fontawesome.com/releases/v6.3.0/js/all.js");
           
            
            
        ?>

        
       

    <?php $APPLICATION->ShowHead(); ?>
    </head>
    <body id="page-top">
    
    
        <!-- Navigation-->  
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">  
        <div class="container">  
            <a class="navbar-brand" href="/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/navbar-logo.svg" alt="..." /></a>  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">  
                Menu  
                <i class="fas fa-bars ms-1"></i>  
            </button>  
            <div class="collapse navbar-collapse" id="navbarResponsive">  
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
            
            </div>  
        </div>  
    </nav>  
        <?php

$APPLICATION->ShowPanel();

?> 
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
            </div>
        </header>
