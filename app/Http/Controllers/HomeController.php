<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected Filesystem $storage;
    public function __construct()
    {
        $this->storage = Storage::disk('s3');
    }

    public function index()
    {
        $user = User::find(1);
        return view('welcome', [
            'user' => $user,
            'avatar' => !empty($user->avatar) ? $this->storage->url($user->avatar) : '',
        ]);
    }

    public function upload(Request $request)
    {
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName();
            $fileName = strtolower((Str::random(10))) . '-' . $fileName;
            $path = '/upload/avatar';
            $pathUrl = $this->storage->putFileAs($path, $file, $fileName, ['visibility' => 'public']);
            if ($pathUrl) {
                $user = User::find(1);
                if (!empty($user->avatar)) {
                    $this->storage->delete($user->avatar);
                }
                $user->update(['avatar' => $pathUrl]);
            }
            return redirect('/');
        }
    }
}
