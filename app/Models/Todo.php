<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Todo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'todos';

    protected $casts = ['is_completed' => 'boolean'];

    protected $fillable = [
        'user_id', 'description', 'due_date', 'title', 'is_completed'
    ];

    protected $appends = ['remaining_time'];

    public function getRemainingTimeAttribute(): string
    {
        return Str::of(Carbon::createFromDate($this->getAttribute('due_date'))->diffForHumans())->remove('from now');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function isCompleted(): bool
    {
        return $this->getAttribute('is_completed') === 1;
    }
}
