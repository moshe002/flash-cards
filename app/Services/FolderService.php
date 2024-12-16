<?php

namespace App\Services;

use App\Models\Folder;
use App\Exceptions\FolderNotCreatedException;

class FolderService {
    
    protected $folder;

    public function __construct(Folder $folder)
    {
        $this->folder = $folder;
    }

    public function index()
    {
        $folders = $this->folder->all();
        
        return $folders;
        //dd($folders);
        // if ($folders->isEmpty()) {
        //     return [];
        // } else {
        //     return $folders;
        // }
    }
    
    public function create(array $params): Folder
    {
        $create = Folder::create($params);
        
        if (!($create instanceof Folder)) {
            throw new FolderNotCreatedException('Failed to create folder.');
        }

        return $create;
    }
}