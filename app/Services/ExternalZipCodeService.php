<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Address;
use Carbon\Carbon;


trait ExternalZipCodeService
{
    public function searchZipCode(string $zipCode){
        $zipCode = $this->removePoint($zipCode);
        $response = Http::get(url : 'https://viacep.com.br/ws/' . $zipCode . '/json')->json();
        return $response;
    }

    function removePoint($valor){
        $valor = trim($valor);
        $valor = str_replace(array('-'), "", $valor);
        return $valor;
    }

    function postAddressZipCode($address){
        $data = [
            'address'  => $address['logradouro'] . ', ' . 'Bairro ' .  $address['bairro'] , ', ' . 
            'Cidade ' . $address['localidade'] . ', ' . 'uf ' . $address['uf'],
            'zip_code' => $this->removePoint($address['cep'])
        ];
        $address = Address::create($data);
        return $address;
    }


}



?>