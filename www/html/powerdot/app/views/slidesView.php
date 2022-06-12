<?php
$allSlides = ($_SESSION['powerPoint']->getAllSlides());
$currentSlide = $_SESSION['powerPoint']->getCurrentSlide();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleSlides.css">
    <title>Power Dot</title>
</head>

<body>
    <div class="divContent">
        <?php switch ($currentSlide->getSlidetype()):
            case 'cover': ?>
                <div class="divCovers">
                    <h1 class="titleCover"><?= $currentSlide->getHeader() ?></h1>
                    <hr class="cover">
                    <h4><?= $currentSlide->getSubheader() ?></h4>
                </div>
                <?php break; ?>
            <?php
            case 'normal': ?>

                <div class="divSlides">
                    <h1><?= $currentSlide->getHeader() ?></h1>
                    <h4><?= $currentSlide->getSubheader() ?></h4>
                </div>
                <hr class="rounded">
                <p><?= $currentSlide->getText() ?></p>
                <?php break; ?>
            <?php
            case 'image': ?>

                <div class="divSlides">
                    <h1><?= $currentSlide->getHeader() ?></h1>
                    <h4><?= $currentSlide->getSubheader() ?></h4>
                </div>
                <hr class="rounded">
                <p><?= $currentSlide->getText() ?></p>
                <br>
                <img src="../pictures/<?= $currentSlide->getImage() ?>">
                <?php break; ?>
        <?php endswitch ?>
    </div>

    <div class="divsBelow">
        <div class="divButtons">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button type="submit" name="button" value="previous">Previous</button>
                <button type="submit" name="button" value="next">Next</button>
                <button type="submit" name="button" value="finalize">End</button>
            </form>
        </div>

        <div class="divSlideNumber">
            <h5><?= $currentSlide->getSlidenum() + 1 ?> of <?= sizeof($_SESSION['powerPoint']->getAllSlides()) ?></h5>
        </div>
    </div>

</body>

</html>