<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'department',
        'message',
    ];

    /**
     * The readable name of the department the message was sent to.
     */
    public function departmentName(): string
    {
        return config('portal.departments.' . $this->department, $this->department);
    }
}
