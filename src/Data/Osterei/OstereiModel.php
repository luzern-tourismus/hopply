<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $tipp;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $gefunden;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $gefundenDateTime;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $uniqueId;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $nummer;

protected function loadModel() {
$this->tableName = "hopply_osterei";
$this->aliasTableName = "hopply_osterei";
$this->label = "Osterei";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "hopply_osterei";
$this->id->externalTableName = "hopply_osterei";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "hopply_osterei_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->tipp = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->tipp->tableName = "hopply_osterei";
$this->tipp->externalTableName = "hopply_osterei";
$this->tipp->fieldName = "tipp";
$this->tipp->aliasFieldName = "hopply_osterei_tipp";
$this->tipp->label = "Tipp";
$this->tipp->allowNullValue = false;

$this->gefunden = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->gefunden->tableName = "hopply_osterei";
$this->gefunden->externalTableName = "hopply_osterei";
$this->gefunden->fieldName = "gefunden";
$this->gefunden->aliasFieldName = "hopply_osterei_gefunden";
$this->gefunden->label = "Gefunden";
$this->gefunden->allowNullValue = false;

$this->gefundenDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->gefundenDateTime->tableName = "hopply_osterei";
$this->gefundenDateTime->externalTableName = "hopply_osterei";
$this->gefundenDateTime->fieldName = "gefunden_date_time";
$this->gefundenDateTime->aliasFieldName = "hopply_osterei_gefunden_date_time";
$this->gefundenDateTime->label = "Gefunden Date Time";
$this->gefundenDateTime->allowNullValue = true;

$this->uniqueId = new \Nemundo\Model\Type\Text\TextType($this);
$this->uniqueId->tableName = "hopply_osterei";
$this->uniqueId->externalTableName = "hopply_osterei";
$this->uniqueId->fieldName = "unique_id";
$this->uniqueId->aliasFieldName = "hopply_osterei_unique_id";
$this->uniqueId->label = "Unique Id";
$this->uniqueId->allowNullValue = false;
$this->uniqueId->length = 36;

$this->nummer = new \Nemundo\Model\Type\Number\NumberType($this);
$this->nummer->tableName = "hopply_osterei";
$this->nummer->externalTableName = "hopply_osterei";
$this->nummer->fieldName = "nummer";
$this->nummer->aliasFieldName = "hopply_osterei_nummer";
$this->nummer->label = "Nummer";
$this->nummer->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "unique_id";
$index->addType($this->uniqueId);

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "nummer";
$index->addType($this->nummer);

}
}