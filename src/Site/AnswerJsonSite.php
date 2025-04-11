<?php

namespace LuzernTourismus\Hopply\Site;

use LuzernTourismus\Hopply\Chatbot\Chatbot;
use LuzernTourismus\Hopply\Data\Osterei\OstereiReader;
use Nemundo\Core\Json\JsonText;
use Nemundo\Web\Site\AbstractSite;

class AnswerJsonSite extends AbstractSite
{

    /**
     * @var AnswerJsonSite
     */
    public static $site;

    protected function loadSite()
    {
        //$this->title = 'Hopply';
        $this->url = 'answer-public';

        AnswerJsonSite::$site = $this;

    }

    public function loadContent()
    {


        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header("HTTP/1.1 200 OK");


        $body = file_get_contents('php://input');

        $json = json_decode($body, true);


        $data=[];
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
        $chatbot->systemPrompt = 'Du bist "Hopply" und bist der Osterhase der Stadt Luzern. 
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

        //$question = $json['question'];

        $chatbot->prompt=$json['question'];

        /*$client = OpenAI::client($apiKey);

        $result = $client->chat()->create([
            'model' => 'o3-mini',  //   'gpt-4',
            'messages' => [
                ['role' => 'developer', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $question],
            ],
        ]);*/


        $data = [];
        $data['answer'] = $chatbot->getHtmlAnswer();  // $result['choices'][0]['message']['content'];

        echo json_encode($data);


    }
}