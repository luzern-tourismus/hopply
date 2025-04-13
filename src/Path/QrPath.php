<?php

namespace LuzernTourismus\Hopply\Path;

use Nemundo\Project\Path\TmpPath;

class QrPath extends TmpPath
{

    protected function loadPath()
    {

        parent::loadPath();
        $this->addPath('qr');

    }

}