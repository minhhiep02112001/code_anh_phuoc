<?php

return [
    'keys' => array_values(array_filter(array_map('trim', explode(',', env('GEMINI_KEYS', ''))))),

    'endpoint' => env('GEMINI_ENDPOINT', 'https://generativelanguage.googleapis.com/v1beta'),

    'default_model' => env('GEMINI_DEFAULT_MODEL', 'models/gemini-flash-lite-latest'),

    'fallback_models' => array_values(array_filter(array_map('trim', explode(',', env('GEMINI_FALLBACK_MODELS', ''))))),

    'timeout' => (int) env('GEMINI_TIMEOUT', 60),

    'cache_seconds' => (int) env('GEMINI_CACHE_SECONDS', 86400),

    // Rate limit
    'rpm_per_key' => (int) env('GEMINI_RPM_PER_KEY', 12),

    'generation' => [
        'temperature' => (float) env('GEMINI_TEMPERATURE', 0.3),
        'maxOutputTokens' => (int) env('GEMINI_MAX_OUTPUT_TOKENS', 1200),

        // Tắt thinking để đỡ ăn token (nếu model hỗ trợ)
        'thinkingConfig' => [
            'thinkingBudget' => 0,
        ],
    ],
];
