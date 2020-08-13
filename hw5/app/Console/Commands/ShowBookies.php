<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowBookies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:bookies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command shows the users that booked books.';

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
     * @return int
     */
    public function handle()
    {
        $this->info("The list of users that need to unbook their books:");

        $books = \App\Book::select('users.name')
            ->join('users', 'users.id', '=', 'books.booked_by')
            ->where('booked_by', '<>', null)->distinct()->get();

        $progressbar = $this->output->createProgressBar(count($books));

        foreach ($books as $book)
        {
            $this->info("\n". $book->name);
            $progressbar->advance();
        }

        $progressbar->finish();


    }
}
