<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
use Nemundo\Model\Id\AbstractModelIdValue;
class OstereiId extends AbstractModelIdValue {
/**
* @var OstereiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
}
}