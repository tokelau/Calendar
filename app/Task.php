<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Task extends Model
{
   // public $id;
   // public $topic;
   // public $type;
   // public $place;
   // public $date;
   // public $duration;
   // public $comment;

   public function __construct() { }
   protected $fillable = ['topic', 'type', 'place', 'date', 'duration', 'comment'];
   public function Infill($data) //для заполнения в бд
    {
        //$this->name    = trim(array_get($data, 'name'));
      	$this->topic    = trim($data->topic);
        $this->type   = empty(trim($data->type)) ? 'Другое' : trim($data->type);
        $this->date = date('Y-m-d H:i:s', strtotime(trim($data->date)));
        $this->place   = empty(trim($data->place)) ? '-' : trim($data->place);
      	$this->duration = empty(trim($data->duration)) ? '-' : trim($data->duration);
        $this->comment = empty(trim($data->comment)) ? '-' : trim($data->comment);
        return $this;
    }
    public function toArray()
    {
        return [
            'topic' => $this->topic,
          	'type' => $this->type,
            'place' => $this->place,
            'date' => $this->date,
            'duration' => $this->duration,
          	'comment' => $this->comment,
        ];
    }

    public $timestamps = false;
}
