<?php

namespace App\Http\Controllers\Albums;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use \FileUploader;

class AlbumPhotosController extends Controller
{
    /**
	 * Remove a album photo
	 *
	 * @return void
	 */
	public function removeFile(Request $request) {

		if ( request()->has('file') ) {

			$uploadDir = 'albums/' . auth()->user()->id . '/' . request('album_month') . '/';
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

        $number_of_photos_selected = request('number_of_photos_selected');
        $max_number_of_photos = auth()->user()->subscription->plan->number_of_photos;

        /**
         * Check if number of photos reached max
         */
        if ($number_of_photos_selected == $max_number_of_photos) {
            return false;
            exit;
        }

		$path = storage_path('app/public/') . 'albums/' . auth()->user()->id . '/' . request('album_month') . '/';

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
            storage_path('app/public/') . 'albums/' . auth()->user()->id . '/' . request('album_month') . '/' . $oldName, 
            storage_path('app/public/') . 'albums/' . auth()->user()->id . '/' . request('album_month') . '/' . $newName
        );

        // Return JSON for view update (through JavaScript)
        echo json_encode([
            'title' => $title,
            'file' => $newName,
            'url' => $newName,
        ]);

    }

    /**
     * Renames a album photo
     * 
     * @return void
     */
    public function setAsMainFile(Request $request) {
        // TODO
        exit;
    }
}
