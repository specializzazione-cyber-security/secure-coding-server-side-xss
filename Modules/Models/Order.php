<?php
namespace App\Modules\Models;
use App\Modules\Models\BaseModel;
use Carbon\Carbon;
use DateTime;
use function PHPSTORM_META\map;

class Order extends BaseModel
{
    public int $user_id;
    public float $total;
    public string $note;
    public DateTime $date;
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
            'user_id',
            'total',
            'note',
            'date',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Costruisce l'istanza della classe
     */
    public function __construct(int $user_id = 0, float $total = 0, string $note = "")
    {
        $this->user_id = $user_id;
        $this->total = $total;
        $this->note = $note;
        $this->date = Carbon::now();
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }
}
