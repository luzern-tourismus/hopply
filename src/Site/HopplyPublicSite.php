<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\HopplyPage;
use LuzernTourismus\Hopply\Usergroup\HopplyUsergroup;
use Nemundo\Web\Site\AbstractSite;

class HopplyPublicSite extends AbstractSite
{

    /**
     * @var HopplySite
     */
    //public static $site;

    protected function loadSite()
    {
        $this->title = 'Hopply';
        $this->url = 'Hopply-public2';

        new QrScanSite($this);
        new AnswerJsonSite($this);


    }

    public function loadContent()
    {




    }

}