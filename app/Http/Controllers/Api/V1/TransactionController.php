<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\TransactionStoreRequest;
use App\Http\Requests\Api\V1\TransactionUpdateRequest;
use App\Http\Resources\TransactionResource;
use App\Http\Services\TransactionService;
use App\Repositories\Contracts\TransactionRepositoryContract;

// use App\Models\User;
// use App\Models\Category;
// use App\Models\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
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
        //     $this->middleware('auth:sanctum')->only([
        //         'store',
        //         'update',
        //         'destroy'
        //     ]);
    }

    public function index(Request $request)
    {
        $transactions = $this->transactionRepository->paginate(perPage: 10);

        return TransactionResource::collection($transactions);
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Api\V1\TransactionStoreRequest $request
     * @return TransactionResource
     */
    public function store(TransactionStoreRequest $request)
    {
        $response = TransactionService::store($request->validated());

        // return new TransactionResource($response->getModel());


        if ($response->success()) {
            // return new TransactionResource($transaction->getModel());
            return new TransactionResource($response->getModel());
        } else {
            return response()->json(['message' => $response->getMessage()], 400);
        }
    }

    // public function show(Transaction $transaction)
    public function show($id)
    {
        $transaction = $this->transactionRepository->findOrFail($id);

        // return TransactionResource::make($transaction);
        return new TransactionResource($transaction);
    }


    public function update(TransactionUpdateRequest $request, int $id)
    {
        // $transaction->update($request->validated()); // old way, just with resources
        // return TransactionResource::make($transaction);

        // $transaction = $this->transactionRepository->update($id, $request->validated()); // old way, added repositories
        // return new TransactionResource($transaction);

        $response = TransactionService::update($id, $request->validated()); // new way, added services

        if ($response->success()) {
            return new TransactionResource($response->getModel());
        } else {
            return response()->json(['message' => $response->getMessage()], 400);
        }
    }

    public function destroy(int $id)
    {
        $this->transactionRepository->delete($id);
        return response()->json(['message' => 'Transaction deleted successfully.']);
    }
}
