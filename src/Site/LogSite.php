<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\LogPage;
use Nemundo\Web\Site\AbstractSite;

class LogSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Log';
        $this->url = 'log';
    }

    public function loadContent()
    {
        (new LogPage())->render();
    }
}