<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DressUpInterface;
use App\Models\Category;
use App\Models\UserAvatarState;
use App\Models\UserInventory;
use App\Models\Item;
use App\User;
use Validator;


class DressUpRepository implements DressUpInterface 
{
    public function __construct(
        Category        $category,
        UserAvatarState $userAvatarState,
        UserInventory   $userInventory,
        User            $user,
        Item            $item
    )
    {
        $this->category        = $category;
        $this->userAvatarState = $userAvatarState;
        $this->userInventory   = $userInventory;
        $this->user            = $user;
        $this->item            = $item;
    }

    public function getAllCategoriesWithItems() 
    {
        return $this->category::all();
    }

    public function getCurrentAvatarState($userId) 
    {
        return $this->userAvatarState->where('is_current_state',1)->where('user_id',$userId)->get();
    }

    public function buyNewItems($request) 
    {
        //validation
        $validator = Validator::make($request->all(),[
            'user_id'      => 'required|exists:users,id',
            'item_ids'     => 'required|array|exists:items,id',
        ]);

        if($validator->fails()){
            return [
                'error' => true,
                'message' => $validator->errors()->first()
            ];
        }

        //check currency & buy the item
        $user = $this->user->find($request->user_id);
        $totalItemValue = $this->item->whereIn('id',$request->item_ids)->sum('price');

        if($user->currency >= $totalItemValue){
            $items = $request->item_ids;
            foreach($items as $key){
                $this->userInventory->updateOrCreate([
                    'user_id' => $user->id,
                    'item_id' => $key
                ],[
                    'quantity' => \DB::raw('quantity + 1')
                ]);
            }

            $user->currency = $user->currency - $totalItemValue;
            $user->save();

            return [
                'error' => false,
                'message' => 'Item successfully added in your inventory'
            ];
        }else{
            return [
                'error' => true,
                'message' => 'You dont have enough currency'
            ];
        }
    }

    public function dressUpWithNewState($request) 
    {
         //validation
         $validator = Validator::make($request->all(),[
            'user_id'      => 'required|exists:users,id',
            'item_ids'     => 'required|array|exists:items,id',
        ]);

        if($validator->fails()){
            return [
                'error' => true,
                'message' => $validator->errors()->first()
            ];
        }

        //check item ids exists in inventory
        $itemIds = $this->userInventory->where('user_id',$request->user_id)->pluck('item_id')->toArray();
        if(empty(array_diff($request->item_ids,$itemIds))){
            $this->userAvatarState->where('is_current_state',1)->where('user_id',$request->user_id)->whereNotIn('item_id',$request->item_ids)->update(['is_current_state' => 0]);
            $items = $request->item_ids;
            foreach($items as $key){
                $this->userAvatarState->updateOrCreate([
                    'user_id' => $request->user_id,
                    'item_id' => $key
                ],[
                    'is_current_state' => 1
                ]);
            }
           
            return [
                'error' => false,
                'message' => 'Avatar dress up successfully'
            ];
        }else{
            return [
                'error' => true,
                'message' => 'Items ids not exists in your inventory..please check'
            ];
        }

    }
}