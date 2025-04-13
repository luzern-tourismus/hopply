<?php
namespace LuzernTourismus\Hopply\Data\LargeLanguageModel;
class LargeLanguageModelModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $largeLanguageModel;

protected function loadModel() {
$this->tableName = "hopply_large_language_model";
$this->aliasTableName = "hopply_large_language_model";
$this->label = "Large Language Model";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hopply_large_language_model";
$this->id->externalTableName = "hopply_large_language_model";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hopply_large_language_model_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->largeLanguageModel = new \Nemundo\Model\Type\Text\TextType($this);
$this->largeLanguageModel->tableName = "hopply_large_language_model";
$this->largeLanguageModel->externalTableName = "hopply_large_language_model";
$this->largeLanguageModel->fieldName = "large_language_model";
$this->largeLanguageModel->aliasFieldName = "hopply_large_language_model_large_language_model";
$this->largeLanguageModel->label = "Large Language Model";
$this->largeLanguageModel->allowNullValue = false;
$this->largeLanguageModel->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "large_language_model";
$index->addType($this->largeLanguageModel);

}
}