<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionBrainstorming extends Model
{
    use HasFactory;

    protected $table = 'action_brainstormings';

    
    protected $fillable = [
        'title',
        'stop',
        'minimize',
        'keepGoing',
        'doMore',
        'start',
        'user_id'
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
      
    ];
}

