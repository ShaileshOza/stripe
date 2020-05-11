<?php
// Our Controller 
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
// This is important to add here. 
use PDF;
use UnsplashPhotos;
use UnsplashSearch;
class CustomerController extends Controller
{
    public function printPDF()
    {
       // This  $data array will be passed to our PDF blade
       $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."];
        
        $pdf = PDF::loadView('pdf_view', $data);  
        // return $pdf->download('medium.pdf');
        // file_put_contents('Brochure.pdf', $pdf->output());
        // return $pdf->download('invoice.pdf');
        $pdf->save('uploads/my_stored_file.pdf');
        // ->stream('download.pdf');
    }

    public function unsplashApi(Request $request){

     $photos     = UnsplashSearch::photos("london", ['per_page'=>5]);
      $data=json_decode($photos,true);
      echo "<pre>";
      print_r($data);
      // echo UnsplashPhotos::photos(['page' => 1, 'order_by' => 'oldest']);
    }
}
?>