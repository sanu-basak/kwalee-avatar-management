<?php

namespace App\Repositories\Interfaces;

interface DressUpInterface 
{
    public function getAllCategoriesWithItems();
    public function getCurrentAvatarState($userId);
    public function buyNewItems($itemDetails);
    public function dressUpWithNewState($itemDetails);
}