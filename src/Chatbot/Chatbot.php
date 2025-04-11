<?php

namespace LuzernTourismus\Hopply\Chatbot;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Config\ConfigFile;
use Nemundo\Core\System\PhpConfig;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Project\Config\ProjectConfigReader;

class Chatbot extends AbstractBase
{

    public $systemPrompt='';

    public $prompt;


    public function getAnswer()
    {

        $apiKey = (new ProjectConfigReader())->getValue('open_ai_api_key');

        $client = \OpenAI::client($apiKey);

        $result = $client->chat()->create([
            'model' => 'o3-mini',  //   'gpt-4',
            'messages' => [
                ['role' => 'developer', 'content' => $this->systemPrompt],
                ['role' => 'user', 'content' => $this->prompt],
            ],
        ]);


        $answer = $result['choices'][0]['message']['content'];



        return $answer;


    }


    public function getHtmlAnswer()
    {

        $answer = $this->getAnswer();

        $html = (new Html($answer))->getValue();

        return $html;


    }


}