<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes_Props extends Model
{
    use HasFactory;
    protected $table = 'note_props';
    protected $primaryKey = 'id';
    protected $fillable = ['notes_id', 'color'];
    public $timestamps = false;

    public function notes(){
        return $this->belongsTo(Notes::class);
    }
}
