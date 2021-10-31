<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class QuestionOptions extends Model
{
    protected $table="tbl_question_keys";

    protected $primaryKey = 'id';

    protected $fillable = [ 'Q_name','options','Q_text','Q_type' ]; 

   

    public static function getQueriedResult()
    {
        return static::get();
    }
}
