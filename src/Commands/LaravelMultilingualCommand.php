<?php

declare(strict_types=1);

namespace WebWhales\LaravelMultilingual\Commands;

use Illuminate\Console\Command;

class LaravelMultilingualCommand extends Command
{
    public $signature = 'laravel-multilingual';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
