<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\SocialAssistanceRecipientResource;
use App\Http\Resources\SocialAssistanceResource;
use App\Interfaces\SocialAssistanceRecipientRepositoryInterface;
use App\Repositories\SocialAssistanceRecipientRepository;
use Illuminate\Http\Request;

class SocialAssistanceRecipientController extends Controller
{
    private SocialAssistanceRecipientRepositoryInterface $socialAssistanceRecipientRepository;

    public function __construct(SocialAssistanceRecipientRepositoryInterface $socialAssistanceRecipientRepository)
    {
        $this->socialAssistanceRecipientRepository = $socialAssistanceRecipientRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true, 'Data penerima Bantuan Sosial Berhasil Diambil', SocialAssistanceRecipientResource::collection($socialAssistanceRecipient), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'nullable|integer',
        ]);
        try {
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );

            return ResponseHelper::jsonResponse(true, 'Data penerima Bantuan Sosial Berhasil Diambil', PaginateResource::make($socialAssistanceRecipient, SocialAssistanceRecipientResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
