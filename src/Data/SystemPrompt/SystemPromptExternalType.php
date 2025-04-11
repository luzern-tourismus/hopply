<?php
namespace LuzernTourismus\Hopply\Data\SystemPrompt;
class SystemPromptExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $systemPrompt;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = SystemPromptModel::class;
$this->externalTableName = "hopply_system_prompt";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->systemPrompt = new \Nemundo\Model\Type\Text\LargeTextType();
$this->systemPrompt->fieldName = "system_prompt";
$this->systemPrompt->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->systemPrompt->externalTableName = $this->externalTableName;
$this->systemPrompt->aliasFieldName = $this->systemPrompt->tableName . "_" . $this->systemPrompt->fieldName;
$this->systemPrompt->label = "System Prompt";
$this->addType($this->systemPrompt);

}
}