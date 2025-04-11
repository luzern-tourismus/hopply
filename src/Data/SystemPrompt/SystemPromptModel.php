<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $systemPrompt;

protected function loadModel() {
$this->tableName = "hopply_system_prompt";
$this->aliasTableName = "hopply_system_prompt";
$this->label = "System Prompt";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hopply_system_prompt";
$this->id->externalTableName = "hopply_system_prompt";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hopply_system_prompt_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->systemPrompt = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->systemPrompt->tableName = "hopply_system_prompt";
$this->systemPrompt->externalTableName = "hopply_system_prompt";
$this->systemPrompt->fieldName = "system_prompt";
$this->systemPrompt->aliasFieldName = "hopply_system_prompt_system_prompt";
$this->systemPrompt->label = "System Prompt";
$this->systemPrompt->allowNullValue = false;

}
}