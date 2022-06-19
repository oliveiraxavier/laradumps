<?php

namespace LaraDumps\LaraDumps\Payloads;

use Illuminate\Database\Eloquent\Model;
use LaraDumps\LaraDumps\Support\Dumper;

class ModelPayload extends Payload
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function type(): string
    {
        return 'model';
    }

    /** @return array<string, array|string> */
    public function content(): array
    {
        $relations = $this->model->relationsToArray();

        return [
            'relations'  => $this->model->relationsToArray() ? Dumper::dump($relations) : [],
            'className'  => get_class($this->model),
            'attributes' => Dumper::dump($this->model->attributesToArray()),
        ];
    }
}
