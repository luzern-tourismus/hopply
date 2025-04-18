<?php
namespace LuzernTourismus\Hopply\Data\Log;
class Log extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LogModel
*/
protected $model;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $date;

/**
* @var \Nemundo\Core\Type\DateTime\Time
*/
public $time;

/**
* @var string
*/
public $ipAddress;

/**
* @var string
*/
public $browserAgent;

/**
* @var string
*/
public $prompt;

/**
* @var string
*/
public $answer;

/**
* @var string
*/
public $languageModel;

/**
* @var int
*/
public $promptToken;

/**
* @var int
*/
public $completionToken;

/**
* @var int
*/
public $totalToken;

/**
* @var int
*/
public $remainingToken;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
$this->date = new \Nemundo\Core\Type\DateTime\Date();
$this->time = new \Nemundo\Core\Type\DateTime\Time();
}
public function save() {
if ($this->date->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->date, $this->typeValueList);
$property->setValue($this->date);
}
if ($this->time->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\TimeDataProperty($this->model->time, $this->typeValueList);
$property->setValue($this->time);
}
$this->typeValueList->setModelValue($this->model->ipAddress, $this->ipAddress);
$this->typeValueList->setModelValue($this->model->browserAgent, $this->browserAgent);
$this->typeValueList->setModelValue($this->model->prompt, $this->prompt);
$this->typeValueList->setModelValue($this->model->answer, $this->answer);
$this->typeValueList->setModelValue($this->model->languageModel, $this->languageModel);
$this->typeValueList->setModelValue($this->model->promptToken, $this->promptToken);
$this->typeValueList->setModelValue($this->model->completionToken, $this->completionToken);
$this->typeValueList->setModelValue($this->model->totalToken, $this->totalToken);
$this->typeValueList->setModelValue($this->model->remainingToken, $this->remainingToken);
$id = parent::save();
return $id;
}
}