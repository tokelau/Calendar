<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   public $id;
   public $topic;
   public $type;
   public $place;
   public $date;
   public $duration;
   public $comment;

   public function __construct() {
   		$topic = '123';
   }

   protected $errors = [];

	protected static $rules = [
	    'topic'    => 'Вы не ввели заголовок',
	];

	public function validate()
    {
        $this->errors = [];

        foreach (static::$rules as $rule => $error_message)
        {
            if (empty($this->$rule))
            {
                $this->errors[$rule] = $error_message;
            }
        }

        return empty($this->errors);
    }

    public function hasErrors()
    {
        return count($this->errors) > 0;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function hasError($field)
    {
        return isset($this->errors[$field]);
    }

    public function getError($field)
    {
        return array_get($this->errors, $field, '');
    }

   public function Infill($data) //для заполнения в бд
    {
        //$this->name    = trim(array_get($data, 'name'));
      	$this->topic    = trim($data->topic);
        $this->type   = trim(array_get($data, 'type'));
        $this->place   = empty(trim(array_get($data, 'place'))) ? '-' : trim(array_get($data, 'place'));
        $this->date = trim(array_get($data, 'date'));
      	$this->duration = empty(trim(array_get($data, 'duration'))) ? '-' : trim(array_get($data, 'duration'));
        $this->comment = empty(trim(array_get($data, 'comment'))) ? '-' : trim(array_get($data, 'comment'));

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

    // public function save()
    // {
    //     // if ($this->validate())
    //     // {
    //     //   	$db = new DataBase;
    //     //   	$db->insert($this->toArray());

    //     //     return true;
    //     // }
    //     return true;
    // }

    public $timestamps = false;

}
