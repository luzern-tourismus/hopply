<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\StatistikPage;
use Nemundo\Web\Site\AbstractSite;

class StatistikSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Statistik';
        $this->url = 'statistik';
    }

    public function loadContent()
    {
        (new StatistikPage())->render();
    }
}