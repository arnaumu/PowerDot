<?php
include('../classes/Check.php');
include('../classes/SlideStatus.php');
session_start();

if (!isset($_SESSION['powerPoint'])) {
    $check = new Check();
    $powerDot = new SlideStatus(0, $check->checkContent($_POST["txtContent"]));
    $_SESSION['powerPoint'] = $powerDot;
    $slideNum  = $_SESSION['powerPoint'] -> getCurrentSlide() -> getSlidenum();
    include('../views/slidesView.php');
} else {
    $slideNum  = $_SESSION['powerPoint'] -> getCurrentSlide() -> getSlidenum();
    if (isset($_POST['button'])) {
        
        switch ($_POST["button"]) {
            case "next":
                if (($slideNum  + 1) > sizeof($_SESSION['powerPoint']->getAllSlides()) - 1) {
                    echo "<script>alert('No hi han més slides');</script>";
                } else {
                    $_SESSION['powerPoint']->setCurrentSlide(($slideNum  + 1));
                }
                break;
            case "previous":
                if (($slideNum  - 1) < 0) {
                    echo "<script>alert('No hi han més slides');</script>";
                } else {
                    $_SESSION['powerPoint']->setCurrentSlide(($slideNum  - 1));
                }
                break;
            case "finalize":
                echo $_SERVER['PHP_SELF'];
                header('Location: ../views/mainView.php');
                break;
        }
        include('../views/slidesView.php');
    }
}
