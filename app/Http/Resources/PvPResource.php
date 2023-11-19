<?php

namespace App\Http\Resources;

use App\Http\Resources\DefaultInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class PvPResource extends JsonResource implements DefaultInterface
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static function default(){
        return [];
    }
    public function toArray($request)
    {
        return [
            'pvp' => [
                'points' => $this->points ?? 0,
                'kills' => $this->kills ?? 0,
                'deaths' => $this->deaths ?? 0,
                'shards' => $this->shards ?? 0
            ]
        ];
    }
}
