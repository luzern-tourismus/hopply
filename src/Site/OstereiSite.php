<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\OstereiPage;
use Nemundo\Web\Site\AbstractSite;

class OstereiSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Osterei';
        $this->url = 'Osterei';
    }

    public function loadContent()
    {
        (new OstereiPage())->render();
    }
}