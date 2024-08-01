<?php

namespace App\Support\Classes;

use Illuminate\Database\Eloquent\Model;

class ServiceResponse
{
    /**
     * @var bool
     */
    private $success;

    /**
     * @var Model|null
     */
    private $model;

    /**
     * @var string|null
     */
    private $message;

    public function __construct(bool $success, ?Model $model = null, string $message = null)
    {
        $this->success = $success;
        $this->model = $model;
        $this->message = $message;
    }

    public function success(): bool
    {
        return $this->success;
    }

    public function getModel(): Model|null
    {
        return $this->model;
    }

    public function getMessage(): string|null
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'model' => $this->model
        ];
    }
}
