<?php
namespace LuzernTourismus\Hopply\Data\Log;
class LogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$value = $this->getModelValue($model->date);
if ($value !== "0000-00-00") {
$this->date = new \Nemundo\Core\Type\DateTime\Date($this->getModelValue($model->date));
}
$this->time = new \Nemundo\Core\Type\DateTime\Time($this->getModelValue($model->time));
$this->ipAddress = $this->getModelValue($model->ipAddress);
$this->browserAgent = $this->getModelValue($model->browserAgent);
$this->prompt = $this->getModelValue($model->prompt);
$this->answer = $this->getModelValue($model->answer);
$this->languageModel = $this->getModelValue($model->languageModel);
$this->promptToken = intval($this->getModelValue($model->promptToken));
$this->completionToken = intval($this->getModelValue($model->completionToken));
$this->totalToken = intval($this->getModelValue($model->totalToken));
$this->remainingToken = intval($this->getModelValue($model->remainingToken));
}
}