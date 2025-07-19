<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\SocialAssistanceResource;
use App\Interfaces\SocialAssistanceRepositoryInterface;
use Illuminate\Http\Request;

class SocialAssistanceController extends Controller
{
    private SocialAssistanceRepositoryInterface $socialAssistanceRepository;
    
    public function __construct(SocialAssistanceRepositoryInterface $socialAssistanceRepository)
    {
        $this->socialAssistanceRepository = $socialAssistanceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $socialAssistance = $this->socialAssistanceRepository->getAll(
                $request->search,
                $request->limit,
                true
            );
            return ResponseHelper::jsonResponse(true, 'Data Bantuan Social Berhasil Diambil', SocialAssistanceResource::collection($socialAssistance), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }


    public function getAllPaginated(Request $request)
    {

        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'nullable|integer|min:1'
        ]);

        try {
            $socialAssistance = $this->socialAssistanceRepository->getAllPaginated(
                $request['search'],
                $request['row_per_page']
            );

            return ResponseHelper::jsonResponse(true, 'Data Bantuan Social Berhasil Diambil', PaginateResource::make($socialAssistance, SocialAssistanceResource::class), 200);
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
