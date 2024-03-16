<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAddressForm extends Form
{
    public $tipo = '';
    public $descripcion = '';
    public $ciudad = '';
    public $referencia = '';
    public $receiver = 1;
    public $receiver_info = [];
    public $default = false;
}
