<?php

namespace Nobledsmarts\DBSentry\Commands;

use Illuminate\Console\Command;

class DBSentryCommand extends Command
{
    public $signature = 'db-sentry';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
