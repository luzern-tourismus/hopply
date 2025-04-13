<?php

namespace LuzernTourismus\Hopply\Script;

use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Pdf\Document\PdfDocument;
use Nemundo\Pdf\Image\PdfImage;
use Nemundo\Pdf\Page\NewPage;
use Nemundo\Pdf\Text\PdfText;
use Nemundo\Pdf\Text\PdfTextBox;
use Nemundo\Pdf\Unit\PdfUnit;
use Nemundo\Project\Path\TmpPath;

class QrBuilderScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'hopply-qr';
    }

    public function run()
    {

        $vordergrundFilename = (new TmpPath())->addPath('vordergrund.png')->getFullFilename();
        $backgroundFilename = (new TmpPath())->addPath('background1.png')->getFullFilename();

        $pdf = new PdfDocument();
        $pdf->unit = PdfUnit::MILLIMETER;
        $pdf->filename = (new TmpPath())->addPath('osterrei.pdf')->getFullFilename();

        $n = 0;

        $reader = new OstereiReader();
        $reader->addOrder($reader->model->nummer);
        foreach ($reader->getData() as $ostereiRow) {

            //$site = clone(QrScanSite::$site);
            //$site->addParameter(new OstereiParameter($ostereiRow->uniqueId));

            $data = 'https://www.srf.ch/';  // $site->getUrlWithDomain();   //   'https://www.srf.ch/';  // 'otpauth://totp/test?secret=B3JX4VCVJDVNXNZ5&issuer=chillerlan.net';

            $option = new QROptions;

// $outputInterface can be one of the classes listed in `QROutputInterface::MODES`
            $option->outputInterface = QRGdImagePNG::class;  // QRGdImageJPEG::class;
            //$option->quality             = 90;
// the size of one qr module in pixels
            $option->drawLightModules = false;
            $option->scale = 5;
            //$option->drawCircularModules = false;

            // $option->imageTransparent = true;
            // $option->transparencyColor = [100,100,100];

            $option->bgColor = [200, 150, 200];
            $option->imageTransparent = true;

            // $option->bgColor = [51, 102, 255];

            //  $option->scale               = 20;
            //  $option->bgColor             = [200, 150, 200];
            //  $option->imageTransparent    = true;
// the color that will be set transparent
// @see https://www.php.net/manual/en/function.imagecolortransparent
            //  $option->transparencyColor   = [200, 150, 200];
            //$option->drawCircularModules = true;
            //$option->drawLightModules    = true;
            //$option->circleRadius        = 0.4;


            $filename = (new TmpPath())->addPath('qr_' . $ostereiRow->nummer . '.png')->getFullFilename();

            (new QrCode($option))->render($data, $filename);


            //$filename = (new TmpPath())->addPath('qr_'.$ostereiRow->nummer.'.webp')->getFullFilename();


            $hoehe = 43;
            $breite = (1241/473)*43;
            $abstand = 5;
            $anzahl = 6;




            $img = new PdfImage($pdf);
            $img->imageFilename = $backgroundFilename;
            $img->x = $abstand;
            $img->y = (($hoehe + $abstand) * $n) + $abstand;
            $img->height = $hoehe;

            $text = new PdfTextBox($pdf);
            $text->text = 'Nr. '.$ostereiRow->nummer;
            $text->x= $abstand+30;
            $text->y =  (($hoehe + $abstand) * $n) + $abstand+7;

            $img = new PdfImage($pdf);
            $img->imageFilename = $filename;
            $img->x = 73+$abstand;
            $img->y = (($hoehe+$abstand) * $n) + 5;
            $img->width = 25;

            /*     $options = new QROptions;

                 $options->outputInterface     = QRImagick::class;
                 $options->imagickFormat       = 'webp'; // e.g. png32, jpeg, webp
                 $options->quality             = 90;
                 $options->scale               = 20;
                 $options->bgColor             = '#ccccaa';
                 $options->imageTransparent    = true;
                 $options->transparencyColor   = '#ccccaa';
                 $options->drawLightModules    = true;
                 $options->drawCircularModules = true;
                 $options->circleRadius        = 0.4;
               /*  $options->keepAsSquare        = [
                     QRMatrix::M_FINDER_DARK,
                     QRMatrix::M_FINDER_DOT,
                     QRMatrix::M_ALIGNMENT_DARK,
                 ];
                 $options->moduleValues        = [
                     QRMatrix::M_FINDER_DARK    => '#A71111', // dark (true)
                     QRMatrix::M_FINDER_DOT     => '#A71111', // finder dot, dark (true)
                     QRMatrix::M_FINDER         => '#FFBFBF', // light (false)
                     QRMatrix::M_ALIGNMENT_DARK => '#A70364',
                     QRMatrix::M_ALIGNMENT      => '#FFC9C9',
                     QRMatrix::M_VERSION_DARK   => '#650098',
                     QRMatrix::M_VERSION        => '#E0B8FF',
                 ];*/


            //(new QrCode($option))->render($data, $filename);

            $n++;

            if (($n % $anzahl) == 0) {
                (new NewPage($pdf));

                $loop = new ForLoop();
                $loop->minNumber = 0;
                $loop->maxNumber = $anzahl-1;
                foreach ($loop->getData() as $number) {

                    $img = new PdfImage($pdf);
                    $img->imageFilename = $vordergrundFilename;
                    $img->x = 210-$abstand-$breite;
                    $img->y = (($hoehe + $abstand) * $number) + $abstand;
                    $img->height = $hoehe;

                }

                (new NewPage($pdf));

                $n = 0;

            }

        }

        $pdf->saveFile();


    }
}