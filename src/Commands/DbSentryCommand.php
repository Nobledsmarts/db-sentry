<?php

namespace Nobledsmarts\DbSentry\Commands;

use Illuminate\Console\Command;

class DbSentryCommand extends Command
{
    public $signature = 'db-sentry';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
