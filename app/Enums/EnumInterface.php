<?php

namespace App\Enums;

interface EnumInterface
{
    /**
     * Method to return the Human-readable format for the enum value.
     *
     * @return ?string
     */
    public function getLabel(): ?string;

    /**
     * Method to return value 
     *
     * @return ?array
     */
    public function getValue(): ?array;
}
