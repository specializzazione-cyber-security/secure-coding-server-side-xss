<?php
namespace App\Modules\Models;
use App\Modules\Models\BaseModel;
use Carbon\Carbon;
use DateTime;
use function PHPSTORM_META\map;

class Article extends BaseModel
{
    public string $name;
    public string $description;
    public string $img;
    public int $count;
    public float $price;
    public DateTime $created_at;
    public DateTime $updated_at;
    /**
     * Setta gli attributi che formano il modello
     * 
     * @return array
     */
    protected function getAttributes(): array
    {
        return [
            'name',
            'description',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Costruisce l'istanza della classe
     */
    public function __construct(string $name = "", string $description = "", string $img = "", int $count = 0, float $price = 0)
    {
        $this->name = $name;
        $this->description = $description;
        $this->img = $img;
        $this->count = $count;
        $this->price = $price;
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }
}
