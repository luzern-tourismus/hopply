<?php

namespace LuzernTourismus\Hopply\Application;

use LuzernTourismus\Hopply\Data\HopplyModelCollection;
use LuzernTourismus\Hopply\Install\HopplyInstall;
use LuzernTourismus\Hopply\Install\HopplyUninstall;
use LuzernTourismus\Hopply\Site\HopplyPublicSite;
use LuzernTourismus\Hopply\Site\HopplySite;
use LuzernTourismus\Hopply\Site\QrScanSite;
use Nemundo\App\Application\Type\AbstractApplication;

class HopplyApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Hopply';
        $this->applicationId = '9b271c3e-8f5c-482e-bf43-b7db57d11d61';
        $this->modelCollectionClass = HopplyModelCollection::class;
        $this->installClass = HopplyInstall::class;
        $this->uninstallClass = HopplyUninstall::class;
        $this->appSiteClass = HopplySite::class;
        $this->publicSiteClass = HopplyPublicSite::class;
    }
}