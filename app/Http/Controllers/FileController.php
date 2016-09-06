<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 28.01.2016
 * Time: 17:03
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\FileClient;
use Illuminate\Http\Response;

class FileController extends Controller {

    public function add($param, $id) {
        return view('fileViews.add', ['param'=>$param,'id'=>$id]);
    }

    public function addPost(Request $request) {
        $files = Input::file('file');
        function _formatted($file)
        {
            $bytes = $file;

            if ($bytes >= 1073741824) {
                return number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                return number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                return number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                return $bytes . ' байт';
            } elseif ($bytes == 1) {
                return '1 байт';
            } else {
                return '0 байт';
            }
        }
        foreach($files as $file) {


            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

            $entry = new FileClient();
            $entry->fileMIME = $file->getClientMimeType();
            $entry->fileOriginalName = $file->getClientOriginalName();
            $entry->fileName = $file->getFilename().'.'.$extension;
            $entry->fileClient = $request->input('_cid');
            $entry->fileSize = _formatted($file->getSize());

            $entry->save();

        }
        echo 'success';



    }
    public function get($filename){

        $entry = FileClient::where('fileOriginalName', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->fileName);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime)
            ->header('Content-Disposition', 'attachment');
    }
}