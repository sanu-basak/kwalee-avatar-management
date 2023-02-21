<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\DressUpInterface;
use Api;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserCurrentAvatarStateResource;


class DressUpController extends Controller
{
    private $dressUpRepository;

    public function __construct(DressUpInterface $dressUpRepository) 
    {
        $this->dressUpRepository = $dressUpRepository;
    }

    public function categoryWithItems() 
    {
        try{
            $categoriesItems =  $this->dressUpRepository->getAllCategoriesWithItems(); 
            return response()->json(Api::apiSuccessResponse(__('message.categoryListItems'),CategoryResource::collection($categoriesItems)),200);
        }catch(\Exception $e){
            return response()->json(Api::apiErrorResponse(__('message.somethingWentWrong')),500);
        }
    }

    public function currentUserAvatarState(Request $request) 
    {
        try{
            $currentState =  $this->dressUpRepository->getCurrentAvatarState($request->user_id); 
            return response()->json(Api::apiSuccessResponse(__('message.userCurrentAvatarState'),UserCurrentAvatarStateResource::collection($currentState)),200);
        }catch(\Exception $e){dd($e);
            return response()->json(Api::apiErrorResponse(__('message.somethingWentWrong')),500);
        }
    }

    public function buyItem(Request $request)
    {
        try{
            $isBuyItem =  $this->dressUpRepository->buyNewItems($request);
            return response()->json(Api::apiSuccessResponse($isBuyItem['message']),200);
        }catch(\Exception $e){dd($e);
            return response()->json(Api::apiErrorResponse(__('message.somethingWentWrong')),500);
        }
    }

    public function dressUpAvatar(Request $request)
    {
        try{
            $dressUp =  $this->dressUpRepository->dressUpWithNewState($request);
            return response()->json(Api::apiSuccessResponse($dressUp['message']),200);
        }catch(\Exception $e){dd($e);
            return response()->json(Api::apiErrorResponse(__('message.somethingWentWrong')),500);
        }
    }
}
