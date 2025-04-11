<?php
namespace LuzernTourismus\Hopply\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\Hopply\Data\HopplyModelCollection;
use LuzernTourismus\Hopply\Application\HopplyApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class HopplyUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new HopplyModelCollection());
}
}