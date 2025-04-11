<?php

namespace LuzernTourismus\Hopply\Com\Tab;

use LuzernTourismus\Hopply\Site\HopplySite;
use Nemundo\Admin\Com\Tab\AdminTab;

class HopplyTab extends AdminTab
{

    public function getContent()
    {

        $this->site=HopplySite::$site;
        return parent::getContent();

    }

}