<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'category')->latest()->simplePaginate(8);

        return view('pages.transactions.index', [
            'transactions' => $transactions,
            'category' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('pages.transactions.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:income,Income,expense,Expense'],
            // 'category'=> ['required'],
            'transaction_date' => ['nullable', 'date'],
            'description' => ['nullable'],
        ]);

        $attributes = array_map(function ($value) { // make strings capitalized
            return is_string($value) ? ucwords(strtolower($value)) : $value;
        }, $attributes);

        $attributes['user_id'] = 7;
        $attributes['category_id'] = 1; //useri qe kam kriju vet (eshte prove atm)



        $attributes['transaction_date'] = $attributes['transaction_date'] ?? Carbon::today()->toDateString();
        // dd($attributes);

        try {
            $transaction = Auth::user()->transactions()->create(Arr::except($attributes, 'description'));

            return redirect('/transactions')->with('success', 'Transaction created successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, Transaction $transaction)
    {
        //authorize
        Gate::authorize('edit-transaction', $transaction);

        $request->validate([
            'amount' => ['required', 'integer', 'max_digits:10'],
            'type' => ['nullable'],
            'category' => ['nullable'],
            'date' => ['nullable', 'date'],
            'description' => ['nullable'],
        ]);

        $transaction->update([
            'amount' => request('amount'),
            'type' => request('type'),
            'category' => request('category'),
            'date' => request('date'),
            'description' => request('description')
        ]);

        return redirect('/transactions');
    }
}
