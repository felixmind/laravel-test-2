<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->input('filters');

        $query = Client::query();

        if (isset($filters['email'])) {
            $query->whereHas('emails', function (Builder $query) use ($filters) {
                $query->where('email', $filters['email']);
            });
        }

        if (isset($filters['phone'])) {
            $query->whereHas('phones', function (Builder $query) use ($filters) {
                $query->where('phone', $filters['phone']);
            });
        }

        if (isset($filters['name'])) {
            $words = explode(' ', $filters['name']);
            $first = trim($words[0]);
            $second = $words[1] ?? null;
            if (isset($first, $second)) {
                $second = trim($second);

                $query->where(function (Builder $query) use ($first, $second) {
                    $query->where(function (Builder $query) use ($first, $second) {
                        $query->where('first_name', $first)
                              ->where('last_name', $second);
                    })->orWhere(function (Builder $query) use ($first, $second) {
                        $query->where('first_name', $second)
                              ->where('last_name', $first);
                    });
                });
            } else {
                $query->where(function (Builder $query) use ($first) {
                    $query->where('first_name', 'LIKE', "%{$first}%")
                          ->orWhere('last_name', 'LIKE', "%{$first}%");
                });
            }
        }

        $clients = $query->with(['phones', 'emails'])->get();

        return $this->jsonResponse(ClientResource::collection($clients));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
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
     * @param Request $request
     * @param         $client
     *
     * @return JsonResponse
     */
    public function update(Request $request, Client $client): JsonResponse
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
