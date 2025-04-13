<?php

namespace LuzernTourismus\Hopply\Page;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Com\ListBox\LargeLanguageModelListBox;
use LuzernTourismus\Hopply\Com\Tab\HopplyTab;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use LuzernTourismus\Hopply\Request\PromptRequest;
use LuzernTourismus\Hopply\Request\SystemPromptRequest;
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

        $systemPrompt = new AdminLargeTextBox($form);
        $systemPrompt->label = 'System Prompt';
        $systemPrompt->name = (new SystemPromptRequest())->getRequestName();

        $prompt = new AdminLargeTextBox($form);
        $prompt->label = 'Prompt';
        $prompt->name = (new PromptRequest())->getRequestName();

        $llm = new LargeLanguageModelListBox($form);
        $llm->emptyValueAsDefault = false;
        $llm->value= $llm->getValue();  // 'gpt-4-turbo';


        new AdminSubmitButton($form);


        if ((new PromptRequest())->hasValue()) {

            $p = new Paragraph($layout);

            $systemPrompt->value= $systemPrompt->getValue();
            $prompt->value = $promtRequest->getValue();
            $llm->value=$prompt->getValue();


            /*
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

            $jsonText = (new JsonText())->addData($data)->getJson();*/
            
            

            $chatbot = new Chatbot();
            $chatbot->systemPrompt= (new SystemPromptRequest())->getValue();
            $chatbot->prompt= $promtRequest->getValue();
            $chatbot->model = $llm->getValue();

            $p->content = $chatbot->getHtmlAnswer();



        }


        /*$copy = new AdminCopyTextBox($layout);
        $copy->value=AnswerJsonSite::$site->getUrlWithDomain();*/



        return parent::getContent();
    }
}