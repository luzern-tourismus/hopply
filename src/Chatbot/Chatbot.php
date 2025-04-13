<?php

namespace LuzernTourismus\Hopply\Chatbot;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Project\Config\ProjectConfigReader;

class Chatbot extends AbstractBase
{

    public $systemPrompt = '';

    public $prompt;

    public $model;

    private $client;


    public function __construct()
    {

        $apiKey = (new ProjectConfigReader())->getValue('open_ai_api_key');
        $this->client = \OpenAI::client($apiKey);

    }


    public function getAnswer()
    {

        $result = $this->client->chat()->create([
            'model' => $this->model,
            'messages' => [
                ['role' => 'developer', 'content' => $this->systemPrompt],
                ['role' => 'user', 'content' => $this->prompt],
            ],
        ]);


        $answer = $result['choices'][0]['message']['content'];

        $answer = (new Text($answer))->replace('ß','ss')->getValue();


        return $answer;


    }


    public function getHtmlAnswer()
    {

        $answer = $this->getAnswer();

        $html = (new Html($answer))->getValue();

        return $html;

    }


    public function getModel()
    {

        $response = $this->client->models()->list();

        $list = [];
        foreach ($response->data as $result) {

            if ($result->object == 'model') {
                $list[] = $result->id;
            }

        }

        return $list;

    }

}