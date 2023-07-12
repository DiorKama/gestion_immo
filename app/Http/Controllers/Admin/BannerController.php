<?php

namespace App\Http\Controllers\Admin;
use App\Models\File;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Services\BannerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $banners = Banner::paginate(15);
        return view('admin.banners.index', ['banners' => $banners]);
    }

    public function create(File $file){
        return view('admin.banners.create');  
    }

    public function store(StoreBannerRequest $request, BannerService $bannerService)
    {
        $validated = $request->validated();
        $banner = Banner::create([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'type_banner' => $request->input('type_banner')
        ]);
        
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $url = $bannerService->uploadImage($file);
            
            File::create([
                'entity_id' => $banner->id,
                'entity_type' => 'banner',
                'url' => $url,
                'sort_order' => 1
            ]);
        }
        return redirect('admin/banners');
    }

    public function edit(Banner $banner)
    {
        return view(
            'admin.banners.edit',
            [
                'banner' => $banner,
            ]
        );
    } 

public function update(UpdateBannerRequest $request, Banner $banner)
{
    $validated = $request->validated();

    $existingFileId = $banner->hasFile();

    if ($existingFileId) {
        $existingFile = File::find($existingFileId);

        if ($request->hasFile('file')) {
            $pathname = public_path('images' . DIRECTORY_SEPARATOR . $banner->file);
            if (File::exists($pathname)) {
                $existingFile = File::find($existingFileId);
                $fileModel = new File();
                $fileModel->delete($existingFile->id);
                // ...
            }
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
     
            $existingFile->update([
                'url' => 'images/' . $filename,
            ]);
        }
    } else {
        if ($request->hasFile('file')) {
            $pathname = public_path('images' . DIRECTORY_SEPARATOR . $banner->file);
            if (File::exists($pathname)) {
                $existingFile = File::find($existingFileId);
                $fileModel = new File();
                $fileModel->delete($existingFile->id);
                // ...
            }
            $file = $request->file('file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            
            File::create([
                'entity_id' => $banner->id,
                'entity_type' => 'banner',
                'url' => 'images/' . $filename,
                'sort_order' => 1
            ]);
        }
    }

    return redirect('admin/banners');
}

    public function destroy( Banner $banner) {
        $banner->delete();
        return redirect()->route('admin.banners.index');
    }
    
}
