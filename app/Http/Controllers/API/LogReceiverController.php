<?php

namespace App\Http\Controllers\API;

use App\Core\Log\Actions\LogAction;
use App\Core\Log\Parsers\LogParser\LogParser;
use App\Core\Log\Requests\StoreLogSendRequest;
use App\Http\Controllers\Controller;
use App\Core\Log\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Log::all());
    }

    /**
     * Сохранение события в лог
     * @param StoreLogSendRequest $request
     * @return JsonResponse
     */
    public function store(StoreLogSendRequest $request): JsonResponse
    {
        resolve(LogAction::class)->execute($request->all());

        return response()->json(['status' => 'success']);
    }

    /**
     * Очистка лога
     * @return JsonResponse
     */
    public function clear(): JsonResponse
    {
        resolve(LogAction::class)->clearLog();

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
