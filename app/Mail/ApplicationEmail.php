<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Property;
use Illuminate\Queue\SerializesModels;

class ApplicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($apar_id,$buil_id)
    {
       
        $this->apar_id = $apar_id;
        $this->buil_id = $buil_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  
       
        $apar_id = $this->apar_id;
        $buil_id = $this->buil_id;
          
        $apartment = Property::where('parent_property_id',$apar_id)->where('id',$buil_id)->first();
        $building = Property::find($apar_id);
        // echo '<pre>';
        // print_r($apartment);exit; 
        return $this->subject('Application To Live At '.$apartment->name.','.$building->name.' ')->view('emails.condeto_application',compact('apartment','building'));
    }
}