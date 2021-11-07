<?php

namespace Wisebits\application\userService\models;

use Wisebits\infrastructure\common\traits\DataObject;
use Wisebits\interfaces\application\userService\models\UserInterface;

/**
 * Class User
 * @package Wisebits\application\userService\models
 */
class User implements UserInterface
{
    use DataObject;

    protected $keys = [
        'id',
        'name',
        'email',
        'deleted',
        'created',
        'notes',
    ];

    /** @return int|null */
    public function getId(): ?int
    {
        return !empty($this->data['id']) ? (int) $this->data['id'] : null;
    }

    /** @return string|null */
    public function getName(): ?string
    {
        return isset($this->data['name']) ? (string) $this->data['name'] : null;
    }

    /** @return string|null */
    public function getEmail(): ?string
    {
        return isset($this->data['email']) ? (string) $this->data['email'] : null;
    }

    /** @return \DateTime|null */
    public function getDeleted(): ?\DateTime
    {
        return !empty($this->data['deleted']) && $this->data['deleted'] instanceof \DateTime
            ? $this->data['deleted']
            : null;
    }

    /** @return bool */
    public function isActive(): bool
    {
        return !empty($this->data['deleted']);
    }

    /** @return \DateTime|null */
    public function getCreated(): ?\DateTime
    {
        return !empty($this->data['created']) && $this->data['created'] instanceof \DateTime
            ? $this->data['created']
            : null;
    }

    /** @return string|null */
    public function getNotes(): ?string
    {
        return isset($this->data['notes']) ? (string) $this->data['notes'] : null;
    }
}
