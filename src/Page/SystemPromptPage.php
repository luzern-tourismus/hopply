<?php

namespace LuzernTourismus\Hopply\Page;

use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class SystemPromptPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new HopplyTab($layout);


        return parent::getContent();
    }
}