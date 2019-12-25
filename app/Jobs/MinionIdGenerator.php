<?php

namespace App\Jobs;

class MinionIdGenerator
{
    protected $length;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->length = 5;
    }

    /**
     * Execute the job.
     *
     * @param $key_index
     * @param int $list_max_number
     * @return string
     */
    public function handle($key_index, $list_max_number = 50000)
    {
        $prime_list_generator = new PrimeListGenerator($list_max_number);

        $prime_list = $prime_list_generator->handle();

        return substr($prime_list, $key_index, $this->length);
    }
}
