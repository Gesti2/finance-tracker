<?php

namespace App\Repositories\Eloquent;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryContract;

class TransactionRepository extends BaseRepository implements TransactionRepositoryContract
{
    // we can put get() methods to retrieve data but its not necessary as eloquent model 
    // provides enough helper methods to query the data

    protected function model()
    {
        return Transaction::class;
    }
}
