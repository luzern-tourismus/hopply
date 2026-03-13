<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Site\Json\AnswerJsonSite;
use LuzernTourismus\Hopply\Site\Json\EggCounterJsonSite;
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
        //$this->url = 'Hopply-public2';
        $this->url = 'hopply-json';

        new QrScanSite($this);
        new AnswerJsonSite($this);
        new EggCounterJsonSite($this);


    }

    public function loadContent()
    {




    }

}