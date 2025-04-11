<?php

namespace LuzernTourismus\Hopply\Install;

use LuzernTourismus\Hopply\Data\HopplyModelCollection;
use LuzernTourismus\Hopply\Usergroup\HopplyUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class HopplyInstall extends AbstractInstall
{
    public function install()
    {

        (new ContentApplication())->installApp();

        (new ModelCollectionSetup())->addCollection(new HopplyModelCollection());
        (new UsergroupSetup())->addUsergroup(new HopplyUsergroup());

    }
}