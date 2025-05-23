<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Data\Osterei\OstereiUpdate;
use LuzernTourismus\Hopply\Parameter\OstereiParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Web\Site\AbstractSite;


class QrScanSite extends AbstractSite
{

    /**
     * @var QrScanSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'QrScan';
        $this->url = 'QrScan';

        QrScanSite::$site = $this;

    }

    public function loadContent()
    {

        $url = 'https://luzern.com/ostern';

        //(new QrScanPage())->render();
        $found = false;

        $uniqueId = (new OstereiParameter())->getValue();

        $reader = new OstereiReader();
        $reader->filter->andEqual($reader->model->uniqueId, $uniqueId);
        $reader->filter->andEqual($reader->model->gefunden, false);
        foreach ($reader->getData() as $ostereiRow) {

            $update = new OstereiUpdate();
            $update->gefunden = true;
            $update->gefundenDateTime = (new DateTime())->setNow();
            $update->updateById($ostereiRow->id);

            $found = true;

        }


        if (!$found) {

            //(new Debug())->write('Ein technisches Problem liegt vor.');

            /*$p = new Paragraph($this);
            $p->content = 'Ein technisches Problem liegt vor.';*/

        }

        (new UrlRedirect())->redirect($url);


    }
}