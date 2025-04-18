<?php
namespace LuzernTourismus\Hopply\Data\Log;
class LogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $date;

/**
* @var \Nemundo\Model\Type\DateTime\TimeType
*/
public $time;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $ipAddress;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $browserAgent;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $prompt;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $answer;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $languageModel;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $promptToken;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $completionToken;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $totalToken;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $remainingToken;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogModel::class;
$this->externalTableName = "hopply_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->date = new \Nemundo\Model\Type\DateTime\DateType();
$this->date->fieldName = "date";
$this->date->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->date->externalTableName = $this->externalTableName;
$this->date->aliasFieldName = $this->date->tableName . "_" . $this->date->fieldName;
$this->date->label = "Date";
$this->addType($this->date);

$this->time = new \Nemundo\Model\Type\DateTime\TimeType();
$this->time->fieldName = "time";
$this->time->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->time->externalTableName = $this->externalTableName;
$this->time->aliasFieldName = $this->time->tableName . "_" . $this->time->fieldName;
$this->time->label = "Time";
$this->addType($this->time);

$this->ipAddress = new \Nemundo\Model\Type\Text\TextType();
$this->ipAddress->fieldName = "ip_address";
$this->ipAddress->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->ipAddress->externalTableName = $this->externalTableName;
$this->ipAddress->aliasFieldName = $this->ipAddress->tableName . "_" . $this->ipAddress->fieldName;
$this->ipAddress->label = "Ip Address";
$this->addType($this->ipAddress);

$this->browserAgent = new \Nemundo\Model\Type\Text\TextType();
$this->browserAgent->fieldName = "browser_agent";
$this->browserAgent->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->browserAgent->externalTableName = $this->externalTableName;
$this->browserAgent->aliasFieldName = $this->browserAgent->tableName . "_" . $this->browserAgent->fieldName;
$this->browserAgent->label = "Browser Agent";
$this->addType($this->browserAgent);

$this->prompt = new \Nemundo\Model\Type\Text\LargeTextType();
$this->prompt->fieldName = "prompt";
$this->prompt->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->prompt->externalTableName = $this->externalTableName;
$this->prompt->aliasFieldName = $this->prompt->tableName . "_" . $this->prompt->fieldName;
$this->prompt->label = "Prompt";
$this->addType($this->prompt);

$this->answer = new \Nemundo\Model\Type\Text\LargeTextType();
$this->answer->fieldName = "answer";
$this->answer->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->answer->externalTableName = $this->externalTableName;
$this->answer->aliasFieldName = $this->answer->tableName . "_" . $this->answer->fieldName;
$this->answer->label = "Answer";
$this->addType($this->answer);

$this->languageModel = new \Nemundo\Model\Type\Text\TextType();
$this->languageModel->fieldName = "language_model";
$this->languageModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->languageModel->externalTableName = $this->externalTableName;
$this->languageModel->aliasFieldName = $this->languageModel->tableName . "_" . $this->languageModel->fieldName;
$this->languageModel->label = "Language Model";
$this->addType($this->languageModel);

$this->promptToken = new \Nemundo\Model\Type\Number\NumberType();
$this->promptToken->fieldName = "prompt_token";
$this->promptToken->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->promptToken->externalTableName = $this->externalTableName;
$this->promptToken->aliasFieldName = $this->promptToken->tableName . "_" . $this->promptToken->fieldName;
$this->promptToken->label = "Prompt Token";
$this->addType($this->promptToken);

$this->completionToken = new \Nemundo\Model\Type\Number\NumberType();
$this->completionToken->fieldName = "completion_token";
$this->completionToken->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->completionToken->externalTableName = $this->externalTableName;
$this->completionToken->aliasFieldName = $this->completionToken->tableName . "_" . $this->completionToken->fieldName;
$this->completionToken->label = "Completion Token";
$this->addType($this->completionToken);

$this->totalToken = new \Nemundo\Model\Type\Number\NumberType();
$this->totalToken->fieldName = "total_token";
$this->totalToken->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->totalToken->externalTableName = $this->externalTableName;
$this->totalToken->aliasFieldName = $this->totalToken->tableName . "_" . $this->totalToken->fieldName;
$this->totalToken->label = "Total Token";
$this->addType($this->totalToken);

$this->remainingToken = new \Nemundo\Model\Type\Number\NumberType();
$this->remainingToken->fieldName = "remaining_token";
$this->remainingToken->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->remainingToken->externalTableName = $this->externalTableName;
$this->remainingToken->aliasFieldName = $this->remainingToken->tableName . "_" . $this->remainingToken->fieldName;
$this->remainingToken->label = "Remaining Token";
$this->addType($this->remainingToken);

}
}