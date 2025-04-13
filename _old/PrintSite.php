<?php


use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Document\HtmlDocument;
use Nemundo\Html\Heading\H2;
use Nemundo\Html\Image\Img;
use Nemundo\Web\Site\AbstractSite;


class PrintSite extends AbstractSite
{

    /**
     * @var \LuzernTourismus\Hopply\Site\QrScanSite
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

        $html = new HtmlDocument();  // new PdfDocument();

        $reader = new OstereiReader();
        $reader->addOrder($reader->model->nummer);
        foreach ($reader->getData() as $ostereiRow) {

            $site = clone(\LuzernTourismus\Hopply\Site\QrScanSite::$site);
            $site->addParameter(new OstereiParameter($ostereiRow->uniqueId));

            $data = $site->getUrlWithDomain();   //   'https://www.srf.ch/';  // 'otpauth://totp/test?secret=B3JX4VCVJDVNXNZ5&issuer=chillerlan.net';


            //$row->addHyperlink($data);

// quick and simple:
            //echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';




            $div = new Div($html);
            $div->addAttribute('style', '-webkit-print-color-adjust: exact;position: relative; background-image: url(\'/img/background1.png\');width:100mm;height:473px; margin-bottom: 100px');

            //$img = new Img($div);-webkit-print-color-adjust': 'exact'
            //$img->src='/img/background1.png';


            $h2 = new H2($div);
            $h2->content = 'Osterei Nr. ' . $ostereiRow->nummer;
            $h2->addAttribute('style','position: absolute; left:290px; top: 30px; font-family: Verdana');  // font-family: Arial');
           // $img->addAttribute('style','position: absolute; left:810px; top: 30px; width: 300px');


            //$qrCode = new QrCode();

            $option = new QROptions();
            $option->drawLightModules = false;

            //$option->bgColor='#B61F15';
            //$option->
            //$option->drawCircularModules=true;


            //$option->imageTransparent=true;
            //$option->transparencyColor= [182,31,21];  // '#B61F15';

            //$option->drawCircularModules  = true;
            //$option->circleRadius         = 0.4;

            //$qrCode->setOptions($option)

            //QROptions::$imageTransparencyBG

            //(new QrCode($option))->render($data);


            $img = new Img($div);
            $img->src = (new QrCode($option))->render($data);
            //$img->width = 300;
            $img->addAttribute('style','position: absolute; left:790px; top: 30px; width: 300px');


            //$filename =(new TmpPath())->addPath('qr_'.$ostereiRow->id.'.jpg')->getFullFilename();

            //(new QrCode)->render($data, $filename);

            //$img = new PdfImage($pdf);
            //$img->imageFilename= $filename;  // (new QrCode)->render($data);*/


        }


        $html->render();


    }
}