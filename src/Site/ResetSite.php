<?php

namespace LuzernTourismus\Hopply\Site;

use chillerlan\QRCode\QRCode;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\Osterei\OstereiUpdate;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Pdf\Document\PdfDocument;
use Nemundo\Pdf\Text\PdfImageCell;
use Nemundo\Web\Site\AbstractSite;


class ResetSite extends AbstractSite
{

    /**
     * @var ResetSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Zurücksetzen';
        $this->url = 'reset-found';

        ResetSite::$site = $this;

    }

    public function loadContent()
    {

        $update =new OstereiUpdate();
        $update->gefunden=false;
        $update->update();

        (new UrlReferer())->redirect();


    }
}