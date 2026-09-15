<?php

require_once __DIR__ . '/../config/config.php';

function emptyData() 
{
    return ['users' => [], 'nextId' => 1];
}

function loadData(): array
{
    if(!is_file(DATA_FILE)) {
        return emptyData();
    }
    $content = file_get_contents(DATA_FILE);

    if ($content === false) {
        return emptyData();
    }

    $data = json_decode($content, true);
    
    if (!is_array($data) || !isset($data['users'], $data['nextId'])) {
        return emptyData();
    }

    return $data;
}

function saveData(array $data): void
{
    file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}