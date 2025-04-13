<?php

namespace LuzernTourismus\Hopply\Page;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Request\PromptRequest;
use LuzernTourismus\Hopply\Site\AnswerJsonSite;
use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Admin\Com\Copy\AdminCopyTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\GeoJson\Feature\PointFeature;
use Nemundo\Core\Json\JsonText;
use Nemundo\Html\Form\Form;
use Nemundo\Html\Paragraph\Paragraph;

class HopplyPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new HopplyTab($layout);

        $promtRequest = new PromptRequest();

        $form= new Form($layout);

        $textarea = new AdminLargeTextBox($form);
        $textarea->name = (new PromptRequest())->getRequestName();


        new AdminSubmitButton($form);


        if ((new PromptRequest())->hasValue()) {

            $p = new Paragraph($layout);

            $textarea->value = $promtRequest->getValue();


            $data = [];

            $reader = new OstereiReader();
            foreach ($reader->getData() as $ostereiRow) {

                $row = [];
                $row[$reader->model->nummer->fieldName] = $ostereiRow->nummer;
                $row[$reader->model->tipp->fieldName] = $ostereiRow->tipp;
                $row[$reader->model->gefunden->fieldName] = $ostereiRow->gefunden;
                $row[$reader->model->gefundenDateTime->fieldName] = $ostereiRow->gefundenDateTime->getIsoDateTime();

                $data[] = $row;

            }

            $jsonText = (new JsonText())->addData($data)->getJson();
            
            

            $chatbot = new Chatbot();
            $chatbot->systemPrompt= 'Du bist "Hopply" und bist der Osterhase der Stadt Luzern. 
Du antwortest immer auf Deutsch.
Du hast Osternester/Ostereier in der Stadt Luzern versteckt. 
Du kannst Tipps geben.


Du wünsccht immer viel Spass bei der Suche oder etwas ähnliches.
Schreibe nie ein Doppel s, sondern immer ss. 

Daten für die Osternester/Ostereier:

- im feld "ort" ist das versteck
- im feld "tipp" ist ein tipp, den du geben kannst oder auch nicht
- im feld "gefunden" ist vermekt, ob das osternest schon gefunden ist
- im feld "gefunden_date_time" ist der zeitpunkt als es gefunden wurde, wurde es gefunden gibst du das datum und uhrzeit an. das datum gibst du in deutschem datums format an. die uhrzeit ohne sekunden.
- gib jeweils nur für ein osternest auskunft oder tipps
- falls ein osternest gefunden wurde, dann gibst du kein tipp mehr

' . $jsonText;


            $chatbot->prompt= $promtRequest->getValue();

            $p->content = $chatbot->getHtmlAnswer();



        }


        /*$copy = new AdminCopyTextBox($layout);
        $copy->value=AnswerJsonSite::$site->getUrlWithDomain();*/



        return parent::getContent();
    }
}