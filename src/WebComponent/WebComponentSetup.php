<?php

namespace LuzernTourismus\Hopply\WebComponent;

use LuzernTourismus\Hopply\HopplyProject;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\FileCopy;
use Nemundo\Core\Path\Path;
use Nemundo\Project\Path\WebPath;

class WebComponentSetup extends AbstractBase
{

    public function installCom($filename)
    {

        $project = new HopplyProject();

        $comPath = (new WebPath())->addPath('com');
        $comPath->createPath();

        $copy = new FileCopy();
        $copy->overwriteExistingFile = true;
        $copy->sourceFilename = (new Path($project->path))->addParentPath()->addPath('com')->addPath($filename)->getFullFilename();
        $copy->destinationFilename = $comPath->addPath($filename)->getFullFilename();
        $copy->copyFile();


        return $this;


    }


}