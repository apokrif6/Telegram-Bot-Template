<?php

class BotManager
{
    public TelegramInteraction $telegramInteraction;
    public DatabaseInteraction $databaseInteraction;

    public function __construct()
    {
        $this->telegramInteraction = new TelegramInteraction();
        $this->databaseInteraction = new DatabaseInteraction();
    }

    public function executeRequest(string $request, array $dataFromChat)
    {
        switch ($request)
        {
            case RequestCases::CASE_NAME:
                break;
        }
    }

    public function checkResponse(string $response, array $dataFromChat)
    {
        $responseFor = $dataFromChat["reply_to_message"]["text"];

        switch ($responseFor) {
            case ResponseCases::CASE_NAME:
                break;
        }
    }

    private function testFunctionForRequests($message, $dataFromChat)
    {
        // do what you want :)
    }

    private function testFunctionForResponse($message, $dataFromChat)
    {
        // do what you need :)
    }
}