<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OneVsOneResource extends JsonResource implements DefaultInterface
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
            '1vs1' => [
                'elo' => $this->elo ?? 0,
                'wins' => $this->wins ?? 0,
                'loses' => $this->loses ?? 0,
                'unrankedwins' => $this->unrankedwins ?? 0
            ]
        ];
    }
}
