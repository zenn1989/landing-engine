<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Backcalls
 * @package App
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property boolean $status 1 = done, 0 = active
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 */
class Backcalls extends Model
{
    protected $casts = [
        'id' => 'int',
        'status' => 'boolean',
        'created_at' => 'string'
    ];
}