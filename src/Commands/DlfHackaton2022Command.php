<?php

declare(strict_types=1);

namespace WebWhales\DlfHackaton2022\Commands;

use Illuminate\Console\Command;

class DlfHackaton2022Command extends Command
{
    public $signature = 'dlf-hackaton-2022';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
