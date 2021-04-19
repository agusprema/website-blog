<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_name', 'menu_type', 'menu_icon', 'parent_id', 'menu_permission', 'menu_active', 'menu_url', 'order_id'];

    protected static $logAttributes = ['menu_name', 'menu_type', 'menu_icon', 'parent_id', 'menu_permission', 'menu_active', 'menu_url', 'order_id'];

    protected static $recordEvents = ['created', 'updated', 'deleted', 'restored'];

    protected static $logName = 'Menu';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "User " . request()->user()->email . " has been {$eventName} Menu";
    }

    public static function Role($role)
    {
        $user = Auth::user();
        return $user->getRoleNames($role);
    }

    public static function Permision($permission)
    {
        $user = Auth::user();
        return $user->getPermissionNames($permission);
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'parent_id')->orderBy('sort_id');
    }

    public function children()
    {

        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort_id');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('sort_id')->get();
    }
}
