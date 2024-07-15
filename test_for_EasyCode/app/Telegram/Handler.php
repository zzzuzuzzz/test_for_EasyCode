<?php

namespace App\Telegram;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function start() {

        $this->reply('Привет! Для подтверждения аккаунта на нашем сайте, отправь мне свою почту!.');
    }

    public function handleChatMessage(Stringable $text): void
    {
        if (strpos($text, '@')) {
            User::where('email', $text)->update(['tg' => $this->message->from()->id()]);
            $this->reply('Спасибо за подтверждение телеграмма! Сюда будут приходить различные уведомления от нашего сайта.');
        }
    }

    public function handleUnknownCommand(Stringable $text): void
    {
        if ($text->value() === '/hello') {
            $this->reply('Привет! Давай начнем!');
        } else {
            $this->reply('Я тебя не понял. Повтори команду');
        }
    }
}
