<?php

use App\Console\Migration\SpecificProjectsLocaleMigrationInsert;
use App\Support\Constants;

return new class extends SpecificProjectsLocaleMigrationInsert {
    protected array $applyToProjects = [
        Constants::BACKEND_CODE_HELLCASE,
    ];

    protected array $rawJsData = [
        'chat.time_disabled.txt' => 'Chat ad is available from {from}:00 to {to}:00',
    ];
};
