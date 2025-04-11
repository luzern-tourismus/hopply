<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var OstereiModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->tipp = $this->getModelValue($model->tipp);
$this->gefunden = boolval($this->getModelValue($model->gefunden));
$this->gefundenDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->gefundenDateTime));
$this->uniqueId = $this->getModelValue($model->uniqueId);
$this->nummer = intval($this->getModelValue($model->nummer));
}
}