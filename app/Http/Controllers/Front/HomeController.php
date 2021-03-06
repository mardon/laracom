<?php

namespace App\Http\Controllers\Front;

use App\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $newests = $this->categoryRepo->findProductsInCategory(2);
        $features = $this->categoryRepo->findProductsInCategory(3);

        return view('front.index', compact('newests', 'features'));
    }
}