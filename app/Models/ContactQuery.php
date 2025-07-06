<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactQuery extends Model
{
    public $timestamps = false; // On utilise PostingDate et LastupdationDate

    protected $fillable = [
        'fullname',
        'email',
        'contactno',
        'message',
        'PostingDate',
        'AdminRemark',
        'LastupdationDate',
        'IsRead',
    ];
}