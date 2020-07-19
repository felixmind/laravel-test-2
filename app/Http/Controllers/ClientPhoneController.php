<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneStoreRequest;
use App\Http\Resources\ClientPhoneResource;
use App\Models\Client;
use App\Models\ClientPhone;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ClientPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Client $client
     *
     * @return JsonResponse
     */
    public function index(Client $client): JsonResponse
    {
        return $this->jsonResponse(ClientPhoneResource::collection($client->phones));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PhoneStoreRequest $request
     * @param Client            $client
     *
     * @return JsonResponse
     */
    public function store(PhoneStoreRequest $request, Client $client): JsonResponse
    {
        $phone = ClientPhone::create([
            'client_id' => $client->id,
            'phone'     => $request->input('phone'),
        ]);

        return $this->jsonResponse(new ClientPhoneResource($phone));
    }

    /**
     * Display the specified resource.
     *
     * @param Client      $client
     * @param ClientPhone $phone
     *
     * @return JsonResponse
     */
    public function show(Client $client, ClientPhone $phone): JsonResponse
    {
        return $this->jsonResponse(new ClientPhoneResource($phone));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhoneStoreRequest $request
     * @param Client            $client
     * @param ClientPhone       $phone
     *
     * @return JsonResponse
     */
    public function update(PhoneStoreRequest $request, Client $client, ClientPhone $phone): JsonResponse
    {
        $phone->update([
            'phone' => $request->input('phone'),
        ]);

        return $this->jsonResponse(new ClientPhoneResource($phone));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client      $client
     * @param ClientPhone $phone
     *
     * @return JsonResponse
     */
    public function destroy(Client $client, ClientPhone $phone): JsonResponse
    {
        try {
            $status = $phone->delete();
        } catch (Throwable $t) {
            throw new HttpException('Error on delete resource');
        }

        return response()->json(['status' => $status]);
    }
}
