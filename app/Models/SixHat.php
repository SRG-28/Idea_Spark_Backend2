<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SixHat extends Model
{
    use HasFactory;

    
    protected $table = 'six_hats';


    protected $fillable = [
        'title',
        'information',
        'emotions',
        'discernment',
        'optimisticResponse',
        'creativity',
        'overview',
        'user_id'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    
    ];

}
