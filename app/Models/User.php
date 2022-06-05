<?php

namespace App\Models;

use App\Models\Grade;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }


    public static function getGuru()
    {
        $records = DB::table('users')->select('nip', 'name', 'email', 'phone_no', 'gender')->where('level', 'guru')->get()->toArray();
        return $records;
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
