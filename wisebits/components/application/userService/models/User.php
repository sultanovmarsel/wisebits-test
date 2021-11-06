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
        'active',
        'createdAt',
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

    /** @return bool */
    public function isActive(): bool
    {
        return !empty($this->data['active']);
    }

    /** @return \DateTime|null */
    public function getCreatedAt(): ?\DateTime
    {
        return !empty($this->data['createdAt']) && $this->data['createdAt'] instanceof \DateTime
            ? $this->data['createdAt']
            : null;
    }

    /** @return string|null */
    public function getNotes(): ?string
    {
        return isset($this->data['notes']) ? (string) $this->data['notes'] : null;
    }
}
