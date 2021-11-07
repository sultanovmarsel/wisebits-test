<?php

namespace App\Models;

/**
 * Class User
 * @package App\Models
 */
class User extends BaseModel
{
    public const FIELD_ID = 'id';
    public const FIELD_NAME = 'name';
    public const FIELD_EMAIL = 'email';
    public const FIELD_CREATED = 'created';
    public const FIELD_DELETED = 'deleted';
    public const FIELD_NOTES = 'notes';

    /** @var string */
    protected $table = 'users';

    /** @var string[] */
    protected $fillable = [
        self::FIELD_ID,
        self::FIELD_NAME,
        self::FIELD_EMAIL,
        self::FIELD_NOTES,
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        self::FIELD_CREATED,
        self::FIELD_DELETED,
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        self::FIELD_ID => 'integer',
        self::FIELD_NAME => 'string',
        self::FIELD_EMAIL => 'string',
        self::FIELD_NOTES => 'string',
    ];
}
