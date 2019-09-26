<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\ItemDetails;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('upload_form');
    }

    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'photos.*'=>'required|file|mimes:jpeg,bmp,png,pdf,docx',
        ]);

        // Pertamanya, cipta rekod untuk items.
        $item = Item::create($request->only('name'));

        // Setelah selesai cipta rekod items, cipta pula rekod untuk setiap item_details
        $files = $request->file('photos');

        foreach($files as $file)
        {
            $filename = $file->getClientOriginalName();

            $filename = $file->store('photos');

            $item->details()->create([
                'filename' => $filename
            ]);
        }

        return 'Upload Successfully';
    }
}
