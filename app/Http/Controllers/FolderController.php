<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolderRequest;
use App\Models\Folder;
use Illuminate\Http\Request;
use Exception;
use App\Services\FolderService;
use Inertia\Inertia;
use App\Http\Resources\FolderResource;

class FolderController extends Controller
{

    protected $folderService;


    public function __construct(FolderService $folderService)
    {
        $this->folderService = $folderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $fetchedFolders = $this->folderService->index();
        
            $folders = FolderResource::collection($fetchedFolders)->resolve();
        } catch (Exception $e) {
            $folders = [
                'data' => $e->getMessage(),
                'code' => 500,
            ];
        }

        return inertia('Home', ['foldersFetched' => $folders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateFolderRequest $request)
    {
        $request->validated();

        try {
            $formData = [
                'title' => $request->getTitle(),
                'description' => $request->getDescription(),
            ];

            $createdFolder = $this->folderService->create($formData);

            $folder = [
                'data' => $createdFolder,
                'code' => 200,
            ];
        } catch (Exception $e) {
            $folder = [
                'data' => $e->getMessage(),
                'code' => 500,
            ]; 
        }

        //return response()->json($folder['data'], $folder['code']);
        return inertia('Home', $folder);
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
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
