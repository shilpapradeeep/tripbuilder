<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Airport extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => isset($this->id)?$this->id:'',
            'code' => isset($this->code)?$this->code:'',
            'city_code' => isset($this->city_code)?$this->city_code:'',
            'name' => isset($this->c_phone)?$this->c_phone:'',
            'city' => isset($this->city)?$this->city:'',
            'country_code' => isset($this->country_code)?$this->country_code:'',
            'latitude' => isset($this->created_at)?$this->created_at:'',
            'longitude' =>isset($this->longitude)?$this->longitude:'',
            'timezone' =>isset($this->timezone)?$this->timezone:''
        ];
    }
}
