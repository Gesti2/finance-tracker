<?php

namespace App\Http\Services;

use App\Repositories\Contracts\TransactionRepositoryContract;
use App\Support\Classes\ServiceResponse;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

use Illuminate\Support\Carbon;




class TransactionService
{

    private static $transactionRepository;


    public function __construct(TransactionRepositoryContract $transactionRepository)
    {
        self::$transactionRepository = $transactionRepository;
    }

    public static function store(array $data)
    {
        try {
            DB::beginTransaction();

            $data['transaction_date'] = $data['transaction_date'] ?? Carbon::today()->toDateString();

            $transaction = self::$transactionRepository->create(
                Arr::only($data, self::fields())
            );


            $transaction->refresh();

            $transaction->user_id = $data['user_id'];
            $transaction->category_id = $data['category_id'];

            DB::commit();

            return new ServiceResponse(true, $transaction);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('TransactionService::store Exception Error: ' . $e->getMessage());

            return new ServiceResponse(false, null, $e->getMessage());
        }
    }


    public static function update(int $id, array $data)
    {
        try {
            DB::beginTransaction();

            $transaction = self::$transactionRepository->update(
                $id,
                Arr::only($data, self::fields())
            );

            $transaction->refresh();

            DB::commit();

            return new ServiceResponse(true, $transaction);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('TransactionService::update Exception Error: ' . $e->getMessage());
        }
    }

    public static function fields(): array
    {
        return [
            'user_id',
            'amount',
            'type',
            'category_id',
            'transaction_date',
            'description',
            // 'is_paid',
        ];
    }
}
