<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Page\HopplyPage;
use LuzernTourismus\Hopply\Usergroup\HopplyUsergroup;
use Nemundo\Web\Site\AbstractSite;

class HopplySite extends AbstractSite
{

    /**
     * @var HopplySite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Hopply';
        $this->url = 'Hopply';
        $this->restricted=true;
        $this->addRestrictedUsergroup(new HopplyUsergroup());

        HopplySite::$site = $this;

        new OstereiSite($this);
        //new SystemPromptSite($this);

    }

    public function loadContent()
    {
        (new HopplyPage())->render();
    }
}