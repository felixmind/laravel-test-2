<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailStoreRequest;
use App\Http\Resources\ClientEmailResource;
use App\Models\Client;
use App\Models\ClientEmail;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ClientEmailController extends Controller
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
        return $this->jsonResponse(ClientEmailResource::collection($client->emails));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmailStoreRequest $request
     * @param Client            $client
     *
     * @return JsonResponse
     */
    public function store(EmailStoreRequest $request, Client $client): JsonResponse
    {
        $email = ClientEmail::create([
            'client_id' => $client->id,
            'email'     => $request->input('email'),
        ]);

        return $this->jsonResponse(new ClientEmailResource($email));
    }

    /**
     * Display the specified resource.
     *
     * @param Client      $client
     * @param ClientEmail $email
     *
     * @return JsonResponse
     */
    public function show(Client $client, ClientEmail $email): JsonResponse
    {
        return $this->jsonResponse(new ClientEmailResource($email));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmailStoreRequest $request
     * @param Client            $client
     * @param ClientEmail       $email
     *
     * @return JsonResponse
     */
    public function update(EmailStoreRequest $request, Client $client, ClientEmail $email): JsonResponse
    {
        $email->update([
            'email' => $request->input('email'),
        ]);

        return $this->jsonResponse(new ClientEmailResource($email));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client      $client
     * @param ClientEmail $email
     *
     * @return JsonResponse
     */
    public function destroy(Client $client, ClientEmail $email): JsonResponse
    {
        try {
            $status = $email->delete();
        } catch (Throwable $t) {
            throw new HttpException('Error on delete resource');
        }

        return response()->json(['status' => $status]);
    }
}
