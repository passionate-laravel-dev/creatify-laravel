<?php

namespace Passionatelaraveldev\CreatifyLaravel\Commands;

use Illuminate\Console\Command;

class CreatifyLaravelCommand extends Command
{
    public $signature = 'creatify-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
