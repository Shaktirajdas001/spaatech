@extends('layouts.app')

@section('content')
<div class="container">
   
            
            <div class="row ">
                      
                    
                    <form  method="post" action="{{ route('savepost')}}" enctype="multipart/form-data"> 
                    @csrf
                    
                      
                         <div class="form-group row">
                            
                              <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Upload a poster image for Event*</label>
                             
                          
                            <div class="col-sm-10">
                              <input type="file" id="image" name="image" class="form-control form-control-lg" id="colFormLabelLg">
                              
                            </div>
                        </div> 
                        
                       
                        
                       
                    
                       <div class="form-group row">
                            
                              <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Write Your Thoughts</label>
                              
                           
                            <div class="col-sm-10">
                              <input id="event_name" type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg" placeholder="thoughts" value="">
                
                            </div>
                        </div>
                        
                        
                       
                       
                      
                        <div class="um-field">
                           <button  class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
                        </div> 
                        </form>          
</div>
</div>
@endsection
