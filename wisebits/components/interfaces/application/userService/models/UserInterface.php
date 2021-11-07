<?php

namespace Wisebits\interfaces\application\userService\models;

use Wisebits\interfaces\infrastructure\common\ModelInterface;

/**
 * Interface UserInterface
 * @package Wisebits\interfaces\application\userService\models
 */
interface UserInterface extends ModelInterface
{
    /** @return int|null */
    public function getId(): ?int;

    /** @return string|null */
    public function getName(): ?string;

    /** @return string|null */
    public function getEmail(): ?string;

    /** @return bool */
    public function isActive(): bool;

    /** @return \DateTime|null */
    public function getDeleted(): ?\DateTime;

    /** @return \DateTime|null */
    public function getCreated(): ?\DateTime;

    /** @return string|null */
    public function getNotes(): ?string;
}
