<?php

require __DIR__ . '/../config.php';

use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use LuzernTourismus\Hopply\Path\QrPath;
use LuzernTourismus\Hopply\Site\QrScanSite;


$data = 'sadffasdf';


$option = new QROptions;
$option->outputInterface = QRGdImagePNG::class;
$option->drawLightModules = false;
$option->scale = 50;
$option->drawLightModules=false;
$option->drawCircularModules=false;
$option->circleRadius=20;

//$option->moduleValues = [200, 150, 200];


/*
$option->moduleValues        = [
    // finder
    \chillerlan\QRCode\Data\QRMatrix::M_FINDER_DARK    => [0, 63, 255], // dark (true)
    \chillerlan\QRCode\Data\QRMatrix::M_FINDER_DOT     => [0, 63, 255],
    \chillerlan\QRCode\Data\QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
    \chillerlan\QRCode\Data\QRMatrix::M_ALIGNMENT      => [23, 233, 233],
    // timing
    \chillerlan\QRCode\Data\QRMatrix::M_TIMING_DARK    => [255, 0, 0],
    \chillerlan\QRCode\Data\QRMatrix::M_TIMING         => [23, 233, 233],
    // format
    \chillerlan\QRCode\Data\QRMatrix::M_FORMAT_DARK    => [67, 159, 84],
    \chillerlan\QRCode\Data\QRMatrix::M_FORMAT         => [23, 233, 233],
    // version
    \chillerlan\QRCode\Data\QRMatrix::M_VERSION_DARK   => [62, 174, 190],
    \chillerlan\QRCode\Data\QRMatrix::M_VERSION        => [233, 233, 233],
    // data
    \chillerlan\QRCode\Data\QRMatrix::M_DATA_DARK      => [0, 0, 0],
    \chillerlan\QRCode\Data\QRMatrix::M_DATA           => [23, 233, 233],
    // darkmodule
    \chillerlan\QRCode\Data\QRMatrix::M_DARKMODULE     => [0, 0, 0],
    // separator
    \chillerlan\QRCode\Data\QRMatrix::M_SEPARATOR      => [23, 233, 233],
    // quietzone
    \chillerlan\QRCode\Data\QRMatrix::M_QUIETZONE      => [23, 233, 233],
    // logo (requires a call to QRMatrix::setLogoSpace()), see QRImageWithLogo
    \chillerlan\QRCode\Data\QRMatrix::M_LOGO           => [23, 233, 233],
    ];*/




//$option->bgColor = [50, 50, 200];
//$option->
$option->imageTransparent = true;
//$option->transparencyColor= [200, 150, 200];
//$option->invertMatrix=true;



$qrFilename = (new QrPath())->addPath('a.png')->getFullFilename();

(new QrCode($option))->render($data, $qrFilename);


