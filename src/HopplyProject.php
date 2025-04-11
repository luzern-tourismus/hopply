<?php
namespace Hopply;
use Nemundo\Project\AbstractProject;
use Nemundo\Core\Path\Path;
class HopplyProject extends AbstractProject {
public function loadProject() {
$this->project = 'Hopply';
$this->projectName = 'hopply';
$this->path = __DIR__;
$this->namespace = __NAMESPACE__;
$this->modelPath = (new Path())
->addPath(__DIR__)
->addParentPath()
->addPath('model')
->getPath();
}
}