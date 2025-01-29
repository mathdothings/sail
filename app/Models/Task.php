<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'tag',
        'title',
        'completed',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function setCompletedAttribute($value)
    {
        $this->attributes['completed'] = $value;
        if ($value) {
            $this->attributes['finished'] = Carbon::now('America/Sao_Paulo')->format('Y-m-d H:i:s');
        }
    }
}
