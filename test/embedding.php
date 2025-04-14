<?php


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Core\Http\Domain\DomainInformation;
use Nemundo\Html\Container\Container;
use Nemundo\Html\Typography\Code;

$widget = new AdminWidget($twoColumnLayout);
$widget->widgetTitle = 'Hopply';


$embedded = '<script src="'.(new DomainInformation())->getDomain().'/com/hopply-chatbot.js"></script>
    <link rel="stylesheet" href="'.(new DomainInformation())->getDomain().'/com/hopply-chatbot.css" />
    <hopply-chatbot></hopply-chatbot>';

$container = new Container($widget);
$container->addContent($embedded);

$code = new Code($widget);
$code->content = htmlspecialchars($embedded);

/*$container->addContent('<script src="https://chatbot.nemundo.ch/chatbot_com.js"></script>
<link rel="stylesheet" href="https://chatbot.nemundo.ch/style.css" />
<hopply-chatbot></hopply-chatbot>');*/


$widget = new AdminWidget($twoColumnLayout);
$widget->widgetTitle = 'Com Test';

$embedded = '<script src="'.(new DomainInformation())->getDomain().'/com/ltag-map.js"></script>
    <ltag-map></ltag-map>';

$container = new Container($widget);
$container->addContent($embedded);

$code = new Code($widget);
$code->content = htmlspecialchars($embedded);