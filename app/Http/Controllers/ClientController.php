<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFilterRequest;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ClientFilterRequest $request
     *
     * @return JsonResponse
     */
    public function index(ClientFilterRequest $request): JsonResponse
    {
        $filters = $request->input('filters');

        $clients = Client::filters($filters)->with(['phones', 'emails'])->get();

        return $this->jsonResponse(ClientResource::collection($clients));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientStoreRequest $request
     *
     * @return JsonResponse
     */
    public function store(ClientStoreRequest $request): JsonResponse
    {
        $client = Client::create([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
        ]);

        return $this->jsonResponse(new ClientResource($client));
    }

    /**
     * Display the specified resource.
     *
     * @param $client
     *
     * @return JsonResponse
     */
    public function show(Client $client): JsonResponse
    {
        return $this->jsonResponse(new ClientResource($client->load(['phones', 'emails'])));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientStoreRequest $request
     * @param                    $client
     *
     * @return JsonResponse
     */
    public function update(ClientStoreRequest $request, Client $client): JsonResponse
    {
        $client->update([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
        ]);

        return $this->jsonResponse(new ClientResource($client->load(['phones', 'emails'])));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $client
     *
     * @return JsonResponse
     */
    public function destroy(Client $client): JsonResponse
    {
        try {
            $status = $client->delete();
        } catch (Throwable $t) {
            throw new HttpException('Error on delete resource');
        }

        return response()->json(['status' => $status]);
    }
}
