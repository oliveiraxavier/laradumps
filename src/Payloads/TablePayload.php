<?php

namespace LaraDumps\LaraDumps\Payloads;

class TablePayload extends Payload
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $name = '';

    public function __construct(array $data = [], string $name = '')
    {
        $this->data = $data;
        $this->name = $name;
        if (blank($this->name)) {
            $this->name = 'Table';
        }
    }

    public function type(): string
    {
        return 'table';
    }

    /**
     * @return array
     */
    public function content(): array
    {
        $values  = [];
        $columns = [];

        foreach ($this->data as $row) {
            foreach ($row as $key => $item) {
                if (!in_array($key, $columns)) {
                    $columns[] = $key;
                }
            }

            $value = [];
            foreach ($columns as $column) {
                $value[$column] = (string) $row[$column];
            }

            $values[] = $value;
        }

        return [
            'fields' => $columns,
            'values' => $values,
            'header' => $columns,
            'label'  => $this->name,
        ];
    }
}
