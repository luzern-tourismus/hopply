<?php
namespace LuzernTourismus\Hopply\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class HopplyUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'Hopply';
$this->usergroupId = '5a8db0c9-7dba-4a80-a427-cb6d332fe9e3';
}
}