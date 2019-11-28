<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use \FileUploader;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
	 * Remove a album photo
	 *
	 * @return void
	 */
	public function removeFile(Request $request) {

		if ( request()->has('file') ) {

			$uploadDir = 'albums/' . request('album_id') . '/';
            $file = storage_path('app/public/') . $uploadDir . str_replace(array('/', '\\'), '', request('file'));
            echo $file;

			if(file_exists($file))
				unlink($file);
		}
		exit;
    }
    
    /**
	 * Upload a album photo
	 *
	 * @return void
	 */
	public function uploadFile(Request $request) {

		$path = storage_path('app/public/') . 'albums/' . request('album_id') . '/';

        // Verify if there is a folder for the album, if not creates one
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // initialize FileUploader
		$FileUploader = new FileUploader('files', array(
			// options
			'limit' => 4,
			'uploadDir' => $path . '/',
			'title' => 'name'
        ));

		// upload
        $upload = $FileUploader->upload();

        echo json_encode($upload);
		exit;
    }
    
    /**
     * Renames a album photo
     * 
     * @return void
     */
    public function renameFile(Request $request) {

        // Get file old name and pathinfo
        $oldName = request('name');
        $pathinfo = pathinfo($oldName);

        // Get file new name (PS: Title is the new name typed on console)
        $title = substr( FileUploader::filterFilename( request('title') ), 0, 200);
        $newName = $title . (isset($pathinfo['extension']) ? '.' . $pathinfo['extension'] : '');

        // Rename file
        File::move(
            storage_path('app/public/') . 'albums/' . request('album_id') . '/' . $oldName, 
            storage_path('app/public/') . 'albums/' . request('album_id') . '/' . $newName
        );

        // Return JSON for view update (through JavaScript)
        echo json_encode([
            'title' => $title,
            'file' => $newName,
            'url' => $newName,
        ]);

    }
}
