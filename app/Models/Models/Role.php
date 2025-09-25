<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $table = 'roles';
    
    // The primary key is 'id' by default, which matches the database structure
    // protected $primaryKey = 'id'; // This is the default, no need to specify
    
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
    
    /**
     * Quan hệ N-N với Users qua bảng user_roles
     * ON DELETE RESTRICT - không được xóa role nếu còn user đang có role này
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'user_roles',
            'role_id',    // Foreign key in pivot table that references this model's primary key (id)
            'user_id'     // Foreign key in pivot table that references the related model's primary key (id)
        );
    }

    /**
     * Quan hệ N-N với Permissions qua bảng permission_role
     * Cho phép role có nhiều permissions và permission có thể thuộc nhiều roles
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            \TCG\Voyager\Models\Permission::class,
            'permission_role',
            'role_id',        // Foreign key in pivot table that references this model's primary key (id)
            'permission_id'   // Foreign key in pivot table that references the related model's primary key (id)
        );
    }
}
