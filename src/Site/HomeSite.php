<?php
namespace Hopply\Site;
use Nemundo\Web\Site\AbstractSite;
class HomeSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Home';
$this->url = 'home';
}
public function loadContent() {
}
}