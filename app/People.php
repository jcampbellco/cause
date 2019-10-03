<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'data',
        'emails',
        'request_ip'
    ];

    public function setDataAttribute(array $data): self
    {
        $this->attributes['data'] = \json_encode($data);

        return $this;
    }

    public function getDataAttribute(): array
    {
        return \json_decode($this->attributes['data'], true);
    }

    public function setEmailsAttribute(array $emails): self
    {
        $this->attributes['emails'] = \json_encode($emails);

        return $this;
    }
}
