<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function category(string $name): void
    // {
    //     $category = Category::firstOrCreate(['name' => strtolower($name)]);

    //     $this->categories()->attach($category);
    // }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
