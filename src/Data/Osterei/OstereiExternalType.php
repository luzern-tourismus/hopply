<?php
namespace LuzernTourismus\Hopply\Data\Osterei;
class OstereiExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = OstereiModel::class;
$this->externalTableName = "hopply_osterei";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->tipp = new \Nemundo\Model\Type\Text\LargeTextType();
$this->tipp->fieldName = "tipp";
$this->tipp->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->tipp->externalTableName = $this->externalTableName;
$this->tipp->aliasFieldName = $this->tipp->tableName . "_" . $this->tipp->fieldName;
$this->tipp->label = "Tipp";
$this->addType($this->tipp);

$this->gefunden = new \Nemundo\Model\Type\Number\YesNoType();
$this->gefunden->fieldName = "gefunden";
$this->gefunden->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->gefunden->externalTableName = $this->externalTableName;
$this->gefunden->aliasFieldName = $this->gefunden->tableName . "_" . $this->gefunden->fieldName;
$this->gefunden->label = "Gefunden";
$this->addType($this->gefunden);

$this->gefundenDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->gefundenDateTime->fieldName = "gefunden_date_time";
$this->gefundenDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->gefundenDateTime->externalTableName = $this->externalTableName;
$this->gefundenDateTime->aliasFieldName = $this->gefundenDateTime->tableName . "_" . $this->gefundenDateTime->fieldName;
$this->gefundenDateTime->label = "Gefunden Date Time";
$this->addType($this->gefundenDateTime);

$this->uniqueId = new \Nemundo\Model\Type\Text\TextType();
$this->uniqueId->fieldName = "unique_id";
$this->uniqueId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->uniqueId->externalTableName = $this->externalTableName;
$this->uniqueId->aliasFieldName = $this->uniqueId->tableName . "_" . $this->uniqueId->fieldName;
$this->uniqueId->label = "Unique Id";
$this->addType($this->uniqueId);

$this->nummer = new \Nemundo\Model\Type\Number\NumberType();
$this->nummer->fieldName = "nummer";
$this->nummer->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->nummer->externalTableName = $this->externalTableName;
$this->nummer->aliasFieldName = $this->nummer->tableName . "_" . $this->nummer->fieldName;
$this->nummer->label = "Nummer";
$this->addType($this->nummer);

}
}