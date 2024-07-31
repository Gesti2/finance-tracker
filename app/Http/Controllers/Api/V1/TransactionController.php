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
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Auth;


class TransactionController extends ApiController
{
    /**
     * @var TransactionRepositoryContract
     */
    private $transactionRepository;

    /**
     * @param TransactionRepositoryContract $transactionRepository
     */
    public function __construct(TransactionRepositoryContract $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
        //
    }

    public function index(Request $request)
    {
        // $transactions = Transaction::with('user', 'category')->latest()->simplePaginate(8);
        // $transactions = Transaction::query()->paginate(perPage: 10);
        $transactions = $this->transactionRepository->paginate(perPage: 10);
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
    public function store(StoreTransactionRequest $request, TransactionRepositoryContract $transactionRepository)
    {
        $validatedData = $request->validated();

        $validatedData['transaction_date'] = $validatedData['transaction_date'] ?? Carbon::today()->toDateString();

        // $transaction = Transaction::create($validatedData); // create() returns a model instance
        $transaction = $transactionRepository->create($validatedData);

        return new TransactionResource($transaction);
        // if ($transaction->success()) {
        //     // return new TransactionResource($transaction->getModel());
        //     return TransactionResource::make($transaction);
        // } else {
        //     return response()->json(['message' => $transaction->getMessage()], 400);
        // }
    }

    // public function show(Transaction $transaction)
    public function show($id)
    {
        // return TransactionResource::make($transaction);
        // return new TransactionResource($transaction);

        $transaction = $this->transactionRepository->findOrFail($id);

        return new TransactionResource($transaction);
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(UpdateTransactionRequest $request, int $id)
    {
        // $transaction->update($request->validated());
        // return TransactionResource::make($transaction);

        $transaction = $this->transactionRepository->update($id, $request->validated());

        return TransactionResource::make($transaction);
    }

    public function destroy(int $id)
    {
        $this->transactionRepository->delete($id);
        return response()->json(['message' => 'Transaction deleted successfully.']);
    }
}
