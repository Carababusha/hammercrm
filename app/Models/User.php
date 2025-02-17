<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    use HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password', 'photo', 'lang', 'last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(\App\Models\Company::class, 'id', 'company_id');
    }

    public function getAll()
    {
        return User::paginate(10);
    }

    public function getFullName(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getAllActiveByCompany(int $company_id)
    {
        return User::where('company_id', $company_id)->paginate(10);
    }
}
