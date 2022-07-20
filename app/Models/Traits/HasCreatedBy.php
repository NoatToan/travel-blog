<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait HasCreatedBy
{
    protected static function boot()
    {
        parent::boot();

        $adminId = static::getAdminID();

        static::saving(function ($model) use ($adminId) {
            if ($model->hasFillAble('updated_by')) {
                $model->updated_by = $adminId;
            }
        });

        static::creating(function ($model) use ($adminId) {
            if ($model->hasFillAble('updated_by')) {
                $model->updated_by = $adminId;
            }
            if ($model->hasFillAble('created_by')) {
                $model->created_by = $adminId;
            }
        });
    }

    public function hasFillAble($column): bool
    {
        return in_array($column, $this->fillable);
    }

    public static function getAdminID()
    {
//        if (Auth::guard('api_admin_user')->check()) {
//            return Auth::guard('api_admin_user')->id();
//        }

        return 1;
    }
}
