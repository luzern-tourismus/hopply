<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class Osterei extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var OstereiModel
*/
protected $model;

/**
* @var string
*/
public $tipp;

/**
* @var bool
*/
public $gefunden;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $gefundenDateTime;

/**
* @var string
*/
public $uniqueId;

/**
* @var int
*/
public $nummer;

public function __construct() {
parent::__construct();
$this->model = new OstereiModel();
$this->gefundenDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$this->typeValueList->setModelValue($this->model->tipp, $this->tipp);
$this->typeValueList->setModelValue($this->model->gefunden, $this->gefunden);
if ($this->gefundenDateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->gefundenDateTime, $this->typeValueList);
$property->setValue($this->gefundenDateTime);
}
$this->typeValueList->setModelValue($this->model->uniqueId, $this->uniqueId);
$this->typeValueList->setModelValue($this->model->nummer, $this->nummer);
$id = parent::save();
return $id;
}
}