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


    // public function edit(User $user, Transaction $transaction): Response
    // {
    //     return $user->id === $transaction->user_id
    //         ? Response::allow()
    //         : Response::deny('You do not own this transaction.');
    // }
}
