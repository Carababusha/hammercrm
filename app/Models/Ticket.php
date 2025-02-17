<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';

    public function createdBy()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'created_by');
    }

    public function getLatestByCompany(int $company_id)
    {
        return Ticket::where('company_id', $company_id)->orderBy('created_at', 'DESC')->get();
    }
}
