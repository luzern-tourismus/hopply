<?php

namespace LuzernTourismus\Hopply\Content\Osterei;

use LuzernTourismus\Hopply\Data\Osterei\OstereiDelete;
use Nemundo\Content\Type\AbstractContentRemove;

class OstereiRemove extends AbstractContentRemove
{
    protected function loadRemove()
    {
        $this->contentType = new OstereiType();
    }

    protected function onDelete()
    {
        (new OstereiDelete())->deleteById($this->dataId);
    }
}