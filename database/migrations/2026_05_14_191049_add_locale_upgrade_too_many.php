<?php

use App\Console\Migration\SpecificProjectsLocaleMigrationInsert;
use App\Support\Constants;

return new class extends SpecificProjectsLocaleMigrationInsert {
    protected array $applyToProjects = [
        Constants::BACKEND_CODE_HELLCASE,
    ];

    protected array $rawJsData = [
        'upgrade_too_many_items' => 'The maximum number of items selected for upgrade is exceeded.',
        'customization_modal.see_more' => 'See more',
        'customization_modal.see_more.description' => 'You can go to store page to see more Backgrounds',
    ];
};
