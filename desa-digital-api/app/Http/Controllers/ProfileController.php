<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\ProfileResource;
use App\Interfaces\ProfileRepositoryInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private ProfileRepositoryInterface $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository) {
      $this->profileRepository = $profileRepository;
    }

    public function index()
    {
      try {
        $profile = $this->profileRepository->get();

        if(!$profile) {
          return ResponseHelper::jsonResponse(false, 'Profile tidak ditemukan', null, 404);
        }

        return ResponseHelper::jsonResponse(true, 'Profile berhasil diambil', new ProfileResource($profile), 200);
      } catch (\Exception $e) {
        return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
      }
    }
}
