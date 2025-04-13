<?php
namespace LuzernTourismus\Hopply\Page;
use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use LuzernTourismus\Hopply\Content\Osterei\OstereiAdmin;
use LuzernTourismus\Hopply\Content\Osterei\OstereiType;
use LuzernTourismus\Hopply\Site\PrintSite;
use LuzernTourismus\Hopply\Site\ResetSite;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
class OstereiPage extends AbstractTemplateDocument {
public function getContent() {

    $layout = new AdminFlexboxLayout($this);
    new HopplyTab($layout);

    //new OstereiAdmin($layout);

    $btn = new AdminSiteButton($layout);
    $btn->site = PrintSite::$site;

    $btn = new AdminSiteButton($layout);
    $btn->site =ResetSite::$site;


    (new OstereiType())->getAdmin($layout);

    //new OstereiType();

    return parent::getContent();
}
}