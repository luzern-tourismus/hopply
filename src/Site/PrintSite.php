<?php

namespace LuzernTourismus\Hopply\Site;

use chillerlan\QRCode\Output\QRGdImagePNG;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\HopplyProject;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use LuzernTourismus\Hopply\Path\QrPath;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Image\Img;
use Nemundo\Pdf\Document\PdfDocument;
use Nemundo\Pdf\Image\PdfImage;
use Nemundo\Pdf\Page\NewPage;
use Nemundo\Pdf\Text\PdfTextBox;
use Nemundo\Pdf\Unit\PdfUnit;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;


class PrintSite extends AbstractSite
{

    /**
     * @var QrScanSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Print';
        $this->url = 'qr-print';

        PrintSite::$site = $this;

    }

    public function loadContent()
    {

        $frontFilename = (new Path((new HopplyProject())->path))->addParentPath()->addPath('data')->addPath('front.png')->getFullFilename();
        $backFilename =  (new Path((new HopplyProject())->path))->addParentPath()->addPath('data')->addPath('back.png')->getFullFilename();

        (new QrPath())->createPath();

        $pdf = new PdfDocument();
        $pdf->unit = PdfUnit::MILLIMETER;
        $pdf->filename = 'osterrei.pdf';

        $n = 0;

        $reader = new OstereiReader();
        $reader->addOrder($reader->model->nummer);
        foreach ($reader->getData() as $ostereiRow) {

            $site = clone(QrScanSite::$site);
            $site->addParameter(new OstereiParameter($ostereiRow->uniqueId));
            $data = $site->getUrlWithDomain();

            $option = new QROptions;
            $option->outputInterface = QRGdImagePNG::class;
            $option->drawLightModules = false;
            $option->scale = 5;

            $option->bgColor = [200, 150, 200];
            $option->imageTransparent = true;

            $qrFilename = (new QrPath())->addPath('qr_' . $ostereiRow->nummer . '.png')->getFullFilename();

            (new QrCode($option))->render($data, $qrFilename);

            $hoehe = 43;
            $breite = (1241/473)*43;
            $abstand = 5;
            $anzahl = 6;

            $img = new PdfImage($pdf);
            $img->imageFilename = $backFilename;
            $img->x = $abstand;
            $img->y = (($hoehe + $abstand) * $n) + $abstand;
            $img->height = $hoehe;

            $text = new PdfTextBox($pdf);
            $text->text = 'Nr. '.$ostereiRow->nummer;
            $text->x= $abstand+30;
            $text->y =  (($hoehe + $abstand) * $n) + $abstand+7;

            $img = new PdfImage($pdf);
            $img->imageFilename = $qrFilename;
            $img->x = 73+$abstand;
            $img->y = (($hoehe+$abstand) * $n) + 5;
            $img->width = 25;

            $n++;

            if (($n % $anzahl) == 0) {
                (new NewPage($pdf));

                $loop = new ForLoop();
                $loop->minNumber = 0;
                $loop->maxNumber = $anzahl-1;
                foreach ($loop->getData() as $number) {

                    $img = new PdfImage($pdf);
                    $img->imageFilename = $frontFilename;
                    $img->x = 210-$abstand-$breite;
                    $img->y = (($hoehe + $abstand) * $number) + $abstand;
                    $img->height = $hoehe;

                }

                (new NewPage($pdf));

                $n = 0;

            }

        }

        $pdf->sendToBrowser();

    }
}