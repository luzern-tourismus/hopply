<?php
namespace LuzernTourismus\Hopply\Data\Log;
class LogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "hopply_log";
$this->aliasTableName = "hopply_log";
$this->label = "Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hopply_log";
$this->id->externalTableName = "hopply_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hopply_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->date = new \Nemundo\Model\Type\DateTime\DateType($this);
$this->date->tableName = "hopply_log";
$this->date->externalTableName = "hopply_log";
$this->date->fieldName = "date";
$this->date->aliasFieldName = "hopply_log_date";
$this->date->label = "Date";
$this->date->allowNullValue = false;

$this->time = new \Nemundo\Model\Type\DateTime\TimeType($this);
$this->time->tableName = "hopply_log";
$this->time->externalTableName = "hopply_log";
$this->time->fieldName = "time";
$this->time->aliasFieldName = "hopply_log_time";
$this->time->label = "Time";
$this->time->allowNullValue = false;

$this->ipAddress = new \Nemundo\Model\Type\Text\TextType($this);
$this->ipAddress->tableName = "hopply_log";
$this->ipAddress->externalTableName = "hopply_log";
$this->ipAddress->fieldName = "ip_address";
$this->ipAddress->aliasFieldName = "hopply_log_ip_address";
$this->ipAddress->label = "Ip Address";
$this->ipAddress->allowNullValue = true;
$this->ipAddress->length = 255;

$this->browserAgent = new \Nemundo\Model\Type\Text\TextType($this);
$this->browserAgent->tableName = "hopply_log";
$this->browserAgent->externalTableName = "hopply_log";
$this->browserAgent->fieldName = "browser_agent";
$this->browserAgent->aliasFieldName = "hopply_log_browser_agent";
$this->browserAgent->label = "Browser Agent";
$this->browserAgent->allowNullValue = true;
$this->browserAgent->length = 255;

$this->prompt = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->prompt->tableName = "hopply_log";
$this->prompt->externalTableName = "hopply_log";
$this->prompt->fieldName = "prompt";
$this->prompt->aliasFieldName = "hopply_log_prompt";
$this->prompt->label = "Prompt";
$this->prompt->allowNullValue = false;

$this->answer = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->answer->tableName = "hopply_log";
$this->answer->externalTableName = "hopply_log";
$this->answer->fieldName = "answer";
$this->answer->aliasFieldName = "hopply_log_answer";
$this->answer->label = "Answer";
$this->answer->allowNullValue = false;

$this->languageModel = new \Nemundo\Model\Type\Text\TextType($this);
$this->languageModel->tableName = "hopply_log";
$this->languageModel->externalTableName = "hopply_log";
$this->languageModel->fieldName = "language_model";
$this->languageModel->aliasFieldName = "hopply_log_language_model";
$this->languageModel->label = "Language Model";
$this->languageModel->allowNullValue = false;
$this->languageModel->length = 255;

$this->promptToken = new \Nemundo\Model\Type\Number\NumberType($this);
$this->promptToken->tableName = "hopply_log";
$this->promptToken->externalTableName = "hopply_log";
$this->promptToken->fieldName = "prompt_token";
$this->promptToken->aliasFieldName = "hopply_log_prompt_token";
$this->promptToken->label = "Prompt Token";
$this->promptToken->allowNullValue = false;

$this->completionToken = new \Nemundo\Model\Type\Number\NumberType($this);
$this->completionToken->tableName = "hopply_log";
$this->completionToken->externalTableName = "hopply_log";
$this->completionToken->fieldName = "completion_token";
$this->completionToken->aliasFieldName = "hopply_log_completion_token";
$this->completionToken->label = "Completion Token";
$this->completionToken->allowNullValue = false;

$this->totalToken = new \Nemundo\Model\Type\Number\NumberType($this);
$this->totalToken->tableName = "hopply_log";
$this->totalToken->externalTableName = "hopply_log";
$this->totalToken->fieldName = "total_token";
$this->totalToken->aliasFieldName = "hopply_log_total_token";
$this->totalToken->label = "Total Token";
$this->totalToken->allowNullValue = false;

$this->remainingToken = new \Nemundo\Model\Type\Number\NumberType($this);
$this->remainingToken->tableName = "hopply_log";
$this->remainingToken->externalTableName = "hopply_log";
$this->remainingToken->fieldName = "remaining_token";
$this->remainingToken->aliasFieldName = "hopply_log_remaining_token";
$this->remainingToken->label = "Remaining Token";
$this->remainingToken->allowNullValue = false;

}
}