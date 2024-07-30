<?php

use App\Models\Transaction;
use App\Models\User;


test('it belongs to a user', function () {

    $user = User::factory()->create();
    $transaction = Transaction::factory()->create([
        'user_id' => $user->id
    ]);

    expect($transaction->user - is($user))->toBeTrue();

    // TODO: also for category
});

// test('can have categories', function () {
//     $transaction = Transaction::factory()->create();

//     $transaction->category()

//     expect(true)->toBeTrue();
// });
