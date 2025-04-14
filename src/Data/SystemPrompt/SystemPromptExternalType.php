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

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $short;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $addOsterei;

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

$this->short = new \Nemundo\Model\Type\Text\TextType();
$this->short->fieldName = "short";
$this->short->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->short->externalTableName = $this->externalTableName;
$this->short->aliasFieldName = $this->short->tableName . "_" . $this->short->fieldName;
$this->short->label = "Short";
$this->addType($this->short);

$this->addOsterei = new \Nemundo\Model\Type\Number\YesNoType();
$this->addOsterei->fieldName = "add_osterei";
$this->addOsterei->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->addOsterei->externalTableName = $this->externalTableName;
$this->addOsterei->aliasFieldName = $this->addOsterei->tableName . "_" . $this->addOsterei->fieldName;
$this->addOsterei->label = "Add Osterei";
$this->addType($this->addOsterei);

}
}