<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
{
    public function edit(User $user, Transaction $transaction): bool
    {
        return $transaction->user->is($user);
    }
}
