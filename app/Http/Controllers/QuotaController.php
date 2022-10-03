<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuotaUpdateRequest;
use App\Models\Quota;
use Exception;
use Illuminate\Http\JsonResponse;

class QuotaController extends Controller
{
    public function update(QuotaUpdateRequest $request): JsonResponse
    {
        try {
            $newQuota = $request->get("quota");
            $quota = Quota::where("vehicle_id", $request->get("vehicle_id"))->firstOrFail();
            if (auth()->user()->role === config("app.roles.fuel_station") && $quota->quota < $newQuota) {
                return response()->json(["error" => "fuel centers are not allowed to increase fuel quota"], 422);
            }
            $quota->update([
                "quota" => $newQuota
            ]);
            return response()->json($quota->toArray(), 200);
        } catch (Exception $exception) {
            return response()->json([], 500);
        }

    }
}
