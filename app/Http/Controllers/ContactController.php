<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotel.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'contact' => ['required', 'string', 'min:4', 'max:50'],
            'message' => ['required', 'string', 'min:8'],
            
        ]);

            $data = array(
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'contact' => $request['contact'],
                        'message' => $request['message'],

                    );

        Mail::to('gamorotcottages@email.com')->send(new ContactUsMail($data));
        return redirect()->action('ContactController@index')->with('Success','Message sent sucessfully!');
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
}
