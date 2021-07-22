<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = "users";
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'remember_token',
        'email_verified_at',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'foto'
    ];
    protected $dates = [
        'updated_at',
        'created_at',
        'email_verified_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /* protected $casts = [
        'email_verified_at' => 'datetime',
    ]; */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function addAssignment()
    {
        return $this->belongsToMany(Activo::class, 'asignacion', 'fkiduser', 'fkidactivo');
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'model_has_roles', 'model_id', 'role_id');
    }
    public function countPage($id)
    {
        $page = Page::findOrFail($id);
        $page->visit = $page->visit + 1;
        $page->save();
    }

    public function showCounter($id)
    {
        $page = Page::findOrFail($id);
        return $page->name . " || Numero de visitas: " . $page->visit;
    }
}
