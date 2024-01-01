<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAddressRequest;
use App\Http\Requests\SaveAddressRequest;
use Illuminate\Http\JsonResponse;

class AddressesController extends Controller
{
    public function index(SearchAddressRequest $request): JsonResponse
    {
        $zipCode = preg_replace('/[^0-9]/', '', $request->get('zip_code'));
        if ($address = Address::findByZipCode($zipCode)) {
            return response()->json($address);
        }

        $data = Http::get("https://viacep.com.br/ws/$zipCode/json/")->json();

        if (array_key_exists('erro', $data)) {
            return response()->json(['message' => 'Cep não encontrado'], 404);
        }

        $address = Address::create([
            'zip_code' => preg_replace('/[^0-9]/', '', $data['cep']) ,
            'street' => $data['logradouro'],
            'neighborhood' => $data['bairro'],
            'city' => $data['localidade'],
            'state' => $data['uf'],
        ]);

        return response()->json($address);
    }

    public function store(SaveAddressRequest $request): JsonResponse
    {
        $data = $request->validated();

        $address = Address::updateOrCreate([
            'zip_code' => preg_replace('/[^0-9]/', '', $data['zip_code']),
        ], $data);

        return response()->json($address);
    }

    public function update(SaveAddressRequest $request, Address $address): JsonResponse
    {
        $data = $request->validated();

        $address->update($data);

        return response()->json($address);
    }

    public function destroy(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json([], 201);
    }

    public function fuzzySearch(Request $request): JsonResponse
    {
        $fuzzySearch = $request->get('fuzzySearch');
        if ($addresses = Address::search($fuzzySearch)->get()) {
            return response()->json($addresses);
        }

        return response()->json(['message' => 'Cep não encontrado'], 404);
    }
}