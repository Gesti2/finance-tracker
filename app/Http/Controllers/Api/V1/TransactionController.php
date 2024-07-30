<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreTransactionRequest;
use App\Http\Requests\Api\V1\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Repositories\Contracts\TransactionRepositoryContract;
// use App\Models\User;
// use App\Models\Category;
// use App\Models\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class TransactionController extends ApiController
{
    /**
     * @var TransactionRepositoryContract
     */
    private $transactionRepository;

    /**
     * @param TransactionRepositoryContract $transactionRepository
     */
    public function __construct(TransactionRepositoryContract $transactionRepositoy)
    {
        $this->transactionRepository = $transactionRepositoy;
        //
    }

    public function index()
    {
        // $transactions = Transaction::with('user', 'category')->latest()->simplePaginate(8);
        $transactions = Transaction::query()->paginate(perPage: 10);
        // dd($transactions);

        return TransactionResource::collection($transactions);
    }

    public function create()
    {
        //
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Api\V1\StoreTransactionRequest $request
     * @return TransactionResource
     */
    public function store(StoreTransactionRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['transaction_date'] = $validatedData['transaction_date'] ?? Carbon::today()->toDateString();

        $transaction = Transaction::create($validatedData); // create() returns a model instance

        return new TransactionResource($transaction->getModel());
        // if ($transaction->success()) {
        //     // return new TransactionResource($transaction->getModel());
        //     return TransactionResource::make($transaction);
        // } else {
        //     return response()->json(['message' => $transaction->getMessage()], 400);
        // }
    }

    public function show(Transaction $transaction)
    {
        // return TransactionResource::make($transaction);
        return new TransactionResource($transaction);
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return TransactionResource::make($transaction);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json(null, 204);
    }
}




// OLD TransactionController  

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Category;
// use App\Models\Transaction;

// use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Auth;


// class TransactionController extends Controller
// {
//     public function index()
//     {
//         $transactions = Transaction::with('user', 'category')->latest()->simplePaginate(8);

//         return view('pages.transactions.index', [
//             'transactions' => $transactions,
//             'category' => Category::all(),
//         ]);
//     }

//     public function create()
//     {
//         return view('pages.transactions.create');
//     }

//     public function store(Request $request)
//     {
//         $attributes = $request->validate([
//             'amount' => ['required', 'numeric'],
//             'type' => ['required', 'in:income,Income,expense,Expense'],
//             // 'category'=> ['required'],
//             'transaction_date' => ['nullable', 'date'],
//             'description' => ['nullable'],
//         ]);

//         $attributes = array_map(function ($value) { // make strings capitalized
//             return is_string($value) ? ucwords(strtolower($value)) : $value;
//         }, $attributes);

//         $attributes['user_id'] = 7;
//         $attributes['category_id'] = 1; //useri qe kam kriju vet (eshte prove atm)



//         $attributes['transaction_date'] = $attributes['transaction_date'] ?? Carbon::today()->toDateString();
//         // dd($attributes);

//         try {
//             $transaction = Auth::user()->transactions()->create(Arr::except($attributes, 'description'));

//             return redirect('/transactions')->with('success', 'Transaction created successfully.');
//         } catch (\Exception $e) {
//             return $e->getMessage();
//         }
//     }

//     public function update(Request $request, Transaction $transaction)
//     {
//         //authorize
//         Gate::authorize('edit-transaction', $transaction);

//         $request->validate([
//             'amount' => ['required', 'integer', 'max_digits:10'],
//             'type' => ['nullable'],
//             'category' => ['nullable'],
//             'date' => ['nullable', 'date'],
//             'description' => ['nullable'],
//         ]);

//         $transaction->update([
//             'amount' => request('amount'),
//             'type' => request('type'),
//             'category' => request('category'),
//             'date' => request('date'),
//             'description' => request('description')
//         ]);

//         return redirect('/transactions');
//     }
// }
