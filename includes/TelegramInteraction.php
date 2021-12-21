<?php

class TelegramInteraction
{
    private function sendInTelegram(array $dataToSend)
    {
        $this->invokeTelegramAPI($dataToSend, "sendMessage");
    }

    private function deleteInTelegram(array $dataToDelete)
    {
        $this->invokeTelegramAPI($dataToDelete, "deleteMessage");
    }

    private function pinMessage(array $dataToPin)
    {
        $this->invokeTelegramAPI($dataToPin, "pinChatMessage");
    }

    private function unpinMessage(array $dataToUnpin)
    {
        $this->invokeTelegramAPI($dataToUnpin, "unpinChatMessage");
    }

    private function createChatInviteLinkInTelegram(array $dataToCreate)
    {
        $this->invokeTelegramAPI($dataToCreate, "createChatInviteLink");
    }

    private function invokeTelegramAPI(array $data, string $functionName)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://api.telegram.org/bot" . Configs::TOKEN . "/$functionName",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(array("Content-Type: application/json"), [])
        ]);

        $result = curl_exec($curl);
        curl_close($curl);
        return (json_decode($result, 1) ? json_decode($result, 1) : $result);
    }
}