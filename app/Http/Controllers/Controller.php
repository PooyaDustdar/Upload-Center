<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Statistics;
use DateTime;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function fileTypeFontAwesome($type=null){
        $images=[
            image_type_to_mime_type(IMAGETYPE_JPEG),
            image_type_to_mime_type(IMAGETYPE_BMP),
            image_type_to_mime_type(IMAGETYPE_PNG),
            image_type_to_mime_type(IMAGETYPE_GIF),
            image_type_to_mime_type(IMAGETYPE_IFF),
            image_type_to_mime_type(IMAGETYPE_PSD),
            image_type_to_mime_type(IMAGETYPE_JPEG2000),
            image_type_to_mime_type(IMAGETYPE_TIFF_II),
            image_type_to_mime_type(IMAGETYPE_TIFF_MM),
            image_type_to_mime_type(IMAGETYPE_JB2),
            image_type_to_mime_type(IMAGETYPE_JP2),
            image_type_to_mime_type(IMAGETYPE_JPC),
            image_type_to_mime_type(IMAGETYPE_JPX),
            image_type_to_mime_type(IMAGETYPE_SWC),
            image_type_to_mime_type(IMAGETYPE_SWF),
            image_type_to_mime_type(IMAGETYPE_WBMP),
            image_type_to_mime_type(IMAGETYPE_XBM),
            image_type_to_mime_type(IMAGETYPE_ICO),
        ];
        $excel=[

        ];
        $pdf=[];
        $audio=[

        ];
        $word=[];
        $archive=[];
        $video=[];
        $text=[];
        $code=[];
        $powerpoint=[];
        if(in_array($type,$images)){
            return 'fa-file-image-o';
        }elseif(in_array($type,$excel)){
            return 'fa-file-excel-o';
        }elseif(in_array($type,$pdf)){
            return 'fa-file-pdf-o';
        }elseif(in_array($type,$audio)){
            return 'fa-file-audio-o';
        }elseif(in_array($type,$word)){
            return 'fa-file-word-o';
        }elseif(in_array($type,$archive)){
            return 'fa-file-archive-o';
        }elseif(in_array($type,$video)){
            return 'fa-file-video-o';
        }elseif(in_array($type,$text)){
            return 'fa-file-text-o';
        }elseif(in_array($type,$code)){
            return 'fa-file-code-o';
        }elseif(in_array($type,$powerpoint)){
            return 'fa-file-powerpoint-o';
        }else{
            return 'fa-file-o';
        }

    }
}
