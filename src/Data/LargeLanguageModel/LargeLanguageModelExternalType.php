<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $largeLanguageModel;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LargeLanguageModelModel::class;
$this->externalTableName = "hopply_large_language_model";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->largeLanguageModel = new \Nemundo\Model\Type\Text\TextType();
$this->largeLanguageModel->fieldName = "large_language_model";
$this->largeLanguageModel->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->largeLanguageModel->externalTableName = $this->externalTableName;
$this->largeLanguageModel->aliasFieldName = $this->largeLanguageModel->tableName . "_" . $this->largeLanguageModel->fieldName;
$this->largeLanguageModel->label = "Large Language Model";
$this->addType($this->largeLanguageModel);

}
}