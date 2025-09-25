<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Quan hệ N-N với Roles qua bảng user_roles
     * ON DELETE CASCADE - xóa user sẽ xóa luôn các bản ghi user_roles tương ứng
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Models\Role::class,
            'user_roles',
            'user_id',    // Foreign key in pivot table that references this model's primary key (id)
            'role_id'     // Foreign key in pivot table that references the related model's primary key (id)
        );
    }

    /**
     * Quan hệ 1-N với Carts
     * ON DELETE CASCADE - xóa user sẽ xóa giỏ hàng của user
     */
    public function carts(): HasMany
    {
        return $this->hasMany(\App\Models\Models\Cart::class, 'user_id');
    }

    /**
     * Quan hệ 1-N với Orders
     * ON DELETE RESTRICT - không được xóa user nếu còn đơn hàng
     */
    public function orders(): HasMany
    {
        return $this->hasMany(\App\Models\Models\Order::class, 'user_id');
    }
}
