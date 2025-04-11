<?php
namespace LuzernTourismus\Hopply\Page;
use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use LuzernTourismus\Hopply\Content\Osterei\OstereiAdmin;
use LuzernTourismus\Hopply\Content\Osterei\OstereiType;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
class OstereiPage extends AbstractTemplateDocument {
public function getContent() {

    $layout = new AdminFlexboxLayout($this);
    new HopplyTab($layout);

    //new OstereiAdmin($layout);

    (new OstereiType())->getAdmin($layout);

    //new OstereiType();

    return parent::getContent();
}
}