<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FessPaymentForm extends Model
{
    use HasFactory;
    protected $table = 'fess_payment_form';
    protected $primaryKey = 'id';
    protected $fillable = ['edu_location_id','edu_course','edu_mode', 'full_name', 'email','mobile_number','amount','address','remark'];

}
