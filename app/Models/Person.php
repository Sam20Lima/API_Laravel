<?php

use Faker\Provider\Base;

class Person {
    private array $base = [
        [
            'name' => 'joao',
            'email' => 'joao@gmail.com'
        ],
        [
            'name' => 'maria',
            'email' => 'maria@gmail.com'
        ],
        [
            'name' => 'jose',
            'email' => 'jose@hotmail.com'
        ],
        [
            'name' => 'pedro',
            'email' => 'pedro@hotmail.com'
        ],
        [
            'name' => 'ana',
            'email' => 'ana@gmail.com'
        ],
        [
            'name' => 'carlos',
            'email' => 'carlos@gmail.com'
        ],
        [
            'name' => 'julia',
            'email' => 'julia@gmail.com'
        ],
        [
            'name' => 'marcos',
            'email' => 'marcos@hotmail.com'
        ],
        [
            'name' => 'juliana',
            'email' => ''
        ],
        [
            'name' => 'carla',
            'email' => 'carla@gmail.com'
        ]
    ];
    
    public function getData() {
        // Retorna a base de dados para consulta.
        return $this->base;
    }
}
$person = new Person();
$data = $person->getData();
print_r($data);
?>