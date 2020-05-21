<?php

namespace App\Console\Commands;

use App\Repositories\BreakingBadRepository;
use Illuminate\Console\Command;

class GetCharacters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'characters:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get characters of Breaking Bad and Better Call Saul';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new BreakingBadRepository)->getCharacters();
    }
}
