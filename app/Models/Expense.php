<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';

    protected $fillable = ['user_id', 'budget_id', 'label', 'amount'];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
