<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use \FileUploader;
use App\User;

class ProfilePictureController extends Controller
{
    /**
     * Upload a profile picture
     * 
     * @return void
     */
    public function uploadPicture(Request $request)
    {
        // Upload Directory
        $path = storage_path('app/public/') . 'user_images/';

        // Verify if there is a folder for the album, if not creates one
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // Upload Configuration
        $configuration = [
            'limit' => 1,
            'fileMaxSize' => 10,
            'extensions' => ['image/*'],
            'title' => 'auto',
            'uploadDir' => $path,
            'replace' => false,
            'editor' => [
                'maxWidth' => 512,
                'maxHeight' => 512,
                'crop' => true,
                'quality' => 95
            ]
        ];

        // Get info from request
        $fileuploader = request('fileuploader');
        $name = auth()->user()->email;
        
        if ( isset($fileuploader) && isset($name) ) {
            $name = str_replace( array('/', '\\'), '', $name );
            
            // if (is_file($configuration['uploadDir'] . $name)) {
                $configuration['title'] = $name;
                $configuration['replace'] = true;
            // }
        }
    
        // initialize FileUploader
        $FileUploader = new FileUploader('files', $configuration);
        
        // call to upload the files
        $data = $FileUploader->upload();

        // Update User model on DB
        $user = User::find(auth()->user()->id);
        $user->profile_picture = $data['files'][0]['name'];
        $user->save();
    
        // export to js
        echo json_encode($data);
        exit;
    }

    /**
     * Remove the profile picture
     * 
     * @return void
     */
    public function removePicture(Request $request)
    {
        if ( request()->has('file') ) {

			$uploadDir = 'user_images/';
            $file = storage_path('app/public/') . $uploadDir . str_replace(array('/', '\\'), '', request('file'));
            echo $file;

            // Verify if file exists, delete de file, and update User model on DB
			if(file_exists($file)) {
				unlink($file);
                $user = User::find(auth()->user()->id);
                $user->profile_picture = null;
                $user->save();
            }
		}
		exit;
    }

    /**
     * Resize the profile picture
     * 
     * @return void
     */
    public function resizePicture(Request $request)
    {
        $fileuploader = request('fileuploader');
        $name = request('name');
        $_editor = request('_editor');

        if (isset($fileuploader) && isset($name) && isset($_editor)) {
            $uploadDir = 'user_images/';
            $file = storage_path('app/public/') . $uploadDir . str_replace(array('/', '\\'), '', $name);
            
            if (is_file($file)) {
                $editor = json_decode($_editor, true);
    
                $FileUploader = Fileuploader::resize($file, null, null, null, (isset($editor['crop']) ? $editor['crop'] : null), 100, (isset($editor['rotation']) ? $editor['rotation'] : null));
            }
        }

        echo json_encode($FileUploader);
        exit;
    }
}
