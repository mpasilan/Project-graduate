@extends('layouts.hotel_layout')

@section('content')
	<!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="{{ asset('site/img/slider-1.jpg') }}">
                <div class="container">
                   
                    
                    <div class="row">
                        
                            <div class="col-6">
                                 <div class="check-form" style="background: white; height: 45rem;">
                                    <h2>Guest details</h2>
                                <h2></h2>
                                <h4></h4>

                                

                                    {{-- @foreach($room as $r)
                                                                                                                {{ $r->id }}
                                                                                                            @endforeach --}}

                                        <div class="card-body">
                                            <form method="POST" action="{{ route('hotel.store') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6 ">
                                                        <input id="fname" placeholder="{{ __('First Name') }}" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}"  autocomplete="fname" autofocus required>
 
                                                        @error('fname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <input id="lname" placeholder="{{ __('Last Name') }}" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>
 
                                                        @error('lname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12 ">
                                                        <input id="email" placeholder="{{ __('Email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
 
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12 ">
                                                        <div class="date-select">
                                                            <p><img src="{{ asset('site/img/calendar.png') }}" alt=""> Date of Birth</p>
                                                            <input type="text" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate1" id="date" value="{{ old('birthdate') }}" required  autocomplete="off">
                                                        
                                                            @error('birthdate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <input type="hidden" id="alternate" name="birthdate">
                                                         </div>
                                                     </div>





                                                     <div class="col-md-6 ">
                                                        <input id="address" placeholder="{{ __('Address') }}" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus required>
 
                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <input id="contact" placeholder="{{ __('Contct No.') }}" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact" autofocus>
 
                                                        @error('contact')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                            @php
                                                                $id = request()->get('category_id')
                                                            @endphp
                                                        @if ($id==1)
                                                            
                                                    <div class="col-md-12">
                                                        <p>Adults</p>
                                                      <select name="Adults" id="Adults" class="form-control @error('Adults') is-invalid @enderror">
                                                       <option value="1">1</option>
                                                          
                                                          <option value="2">2</option>
                                                        
                                                      </select>
                                                                <input type="hidden" name="Child" value="0">
                                                                <br>
                                                    </div>

                                                    
                                                            @elseif($id == 2)
                                                            <div class="col-md-6">
                                                        <p>Adult</p>
                                                      <select name="Adults" id="Adults" class="form-control @error('Adults') is-invalid @enderror">
                                                       <option value="1">1</option>
                                                          
                                                          <option value="2">2</option>
                                                        
                                                      </select>
                                                                @error('Adults')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p>Child</p>
                                                      <select name="Child" id="Child" class="form-control @error('Child') is-invalid @enderror">
                                                        <option value="0">...</option>
                                                       <option value="1">1</option>                                                        
                                                    
                                                      </select>
                                                                @error('Child')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <br>
                                                    </div>
                                                        


                                                @elseif($id == 3)

                                                    <div class="col-md-6">
                                                        <p>Adult</p>
                                                      <select name="Adults" id="Adults" class="form-control @error('Adults') is-invalid @enderror">
                                                       <option value="1">1</option>
                                                          
                                                          <option value="2">2</option>
                                                        
                                                      </select>
                                                                @error('Adults')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p>Child</p>
                                                      <select name="Child" id="Child" class="form-control @error('Child') is-invalid @enderror">
                                                        <option value="0">...</option>
                                                       <option value="1">1</option> 
                                                       <option value="2">2</option>                                                        
                                                    
                                                      </select>
                                                               
                                                                <br>
                                                    </div>


                                                @elseif($id == 4)

                                                    <div class="col-md-6">
                                                        <p>Adult</p>
                                                      <select name="Adults" id="Adults" class="form-control">
                                                       <option value="1">1</option>       
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                        
                                                      </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p>Child</p>
                                                      <select name="Child" id="Child" class="form-control">
                                                        <option value="0">...</option>
                                                       <option value="1">1</option> 
                                                       <option value="2">2</option>  
                                                       <option value="3">3</option> 
                                                       <option value="4">4</option> 

                                                    
                                                      </select>

                                                                <br>
                                                    </div>
                                                  @endif  
                                                <div class="form-group row mb-0">
                                                    <div class="col-md-11 ">
                                                        <button type="submit">Continue<i class="lnr lnr-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>

                                        </div>
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End --> 
@endsection