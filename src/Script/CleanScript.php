<?php

namespace LuzernTourismus\Hopply\Script;

use LuzernTourismus\Hopply\Application\HopplyApplication;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class CleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'hopply-clean';
    }

    public function run()
    {
        (new HopplyApplication())->reinstallApp();
    }
}