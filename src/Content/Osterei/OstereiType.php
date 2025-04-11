<?php

namespace LuzernTourismus\Hopply\Content\Osterei;

use Nemundo\Content\Type\AbstractContentType;

class OstereiType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Osterei';
        $this->typeId = 'e965f3b4-3261-4d94-a190-876ccf3253e6';
        $this->formClassList[] = OstereiForm::class;
        $this->viewClassList[] = OstereiView::class;
        $this->itemClass = OstereiItem::class;
        $this->removeClass = OstereiRemove::class;
        $this->adminClass = OstereiAdmin::class;
    }
}