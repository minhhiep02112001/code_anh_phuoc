<?php

return [
    // Telegram logger bot token
    'token' => env('TELEGRAM_LOGGER_BOT_TOKEN' , '6288854440:AAHlwGBN2AlIxZjVlZL2ZaK1RhL9rs7szzw'),

    // Telegram chat id
    'chat_id' => env('TELEGRAM_LOGGER_CHAT_ID', '6288854440' ),

    // Blade Template to use formatting logs
    'template' => env('TELEGRAM_LOGGER_TEMPLATE', 'laravel-telegram-logging::standard'),

    // Proxy server
    'proxy' => env('TELEGRAM_LOGGER_PROXY', ''),

    // Telegram sendMessage options: https://core.telegram.org/bots/api#sendmessage
    'options' => [
        // 'parse_mode' => 'html',
        // 'disable_web_page_preview' => true,
        // 'disable_notification' => false
    ]
];
