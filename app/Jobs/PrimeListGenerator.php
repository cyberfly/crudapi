<?php

namespace App\Jobs;

class PrimeListGenerator
{
    protected $max_number;

    /**
     * Create a new job instance.
     *
     * @param $max_number
     */
    public function __construct($max_number)
    {
        $this->max_number = $max_number;
    }

    /**
     * Execute the job.
     *
     * @return string
     */
    public function handle()
    {
        // since there alot of minions, we can use one if the fastest method which is sieve of Eratosthenes
        return $this->sievePrimeGenerator($this->max_number);
    }

    /**
     * The sieve of Eratosthenes is one of the most efficient ways to find all primes smaller than n when n is smaller than 10 million or so
     * reference: https://www.geeksforgeeks.org/sieve-of-eratosthenes/
     * @param $n
     * @return string
     */
    private function sievePrimeGenerator($n)
    {
        $prime_list = '';
        $prime = array_fill(0, $n+1, true);

        for ($p = 2; $p*$p <= $n; $p++)
        {
            // If prime[p] is not changed,
            // then it is a prime
            if ($prime[$p] == true)
            {
                // Update all multiples of p
                for ($i = $p*$p; $i <= $n; $i += $p) {
                    $prime[$i] = false;
                }
            }
        }

        // Print all prime numbers
        for ($p = 2; $p <= $n; $p++) {
            if ($prime[$p]) {
                $prime_list = $prime_list . $p;
            }
        }

        return $prime_list;
    }
}
