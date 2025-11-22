<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'status',
        'department',
        'birth_date',
        'image_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mutator: set password.
     * - Jika value sudah berbentuk bcrypt (pattern $2y$... / $2b$...), simpan apa adanya.
     * - Jika bukan, lakukan bcrypt agar password tersimpan aman.
     */
    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            return;
        }

        // Cek pola bcrypt (panjang 60, mulai dengan $2y$ atau $2b$ atau $2a$)
        if (is_string($value) && preg_match('/^\$2[ayb]\$.{56}$/', $value)) {
            $this->attributes['password'] = $value;
        } else {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
