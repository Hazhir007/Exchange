<?php


namespace App\Repositories\PairCurrencyRepository;


interface PairCurrencyRepositoryInterface
{
    public function all();
    public function create(array  $data);
    public function findPair(string $pair);
    public function updatePairs(array $data);
}
