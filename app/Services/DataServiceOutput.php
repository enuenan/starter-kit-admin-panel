<?php

namespace App\Services;

use App\DataTransferObjects\BaseDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class DataServiceOutput
{
    protected $data = null;
    protected $message = null;
    protected $is_success = false;

    public function __construct(Collection|Model|array|null|BaseService|BaseDTO $data, string|null $message = null, bool $is_success = true)
    {
        $this->data = $data;
        $this->message = $message;
        $this->is_success = $is_success;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function isSuccess()
    {
        return $this->is_success;
    }

    public function setData($data): static
    {
        $this->data = $data;
        return $this;
    }

    public function setMessage($message): static
    {
        $this->message = $message;
        return $this;
    }

    public function setSuccess($is_success): static
    {
        $this->is_success = $is_success;
        return $this;
    }
}
