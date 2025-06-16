@extends('base') 

@section('title', config('app.name'). ' | Publiez une request')

@section('content')
    
<main class="main">
    <section class="box-section box-breadcrumb background-100">
      <div class="container"> 
        <ul class="breadcrumbs"> 
          <li> <a href="index.html">Accueille</a><span class="arrow-right"> 
              <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg></span></li>
          <li> <span class="text-breadcrumb">Publiez une demande</span></li>
        </ul>
      </div>
    </section>
    <section class="section-box box-become-video background-body">
      <div class="container">       
        <div class="text-center">               
          <h2 class="mt-15 mb-15 neutral-1000 wow fadeInUp">Publiez une demande</h2>
        </div>
        <div class="row"> 
          <div class="col-12"> 
            <h5 class="mb-30 neutral-1000">Details de la demande</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">                
            <form action="{{route($request->exists ? 'annonces.update' : 'annonces.store', $request)}}" method="POST" class="p-5 border rounded-2">
                @csrf

                @if ($request->exists)
                    @method('PUT')
                @endif

              <div class="form-contact"> 
                <div class="row"> 

                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label for="title" class="text-sm-medium neutral-1000">Titre</label>
                      <input type="text" id="title" name="title" value="{{old('title', $request->title)}}" class="form-control" placeholder="Titre">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="kg" class="text-sm-medium neutral-1000">Poids (Kg) </label>
                      <input type="text" id="kg" name="kg" value="{{old('kg', $request->kg)}}" class="form-control" placeholder="poid en kilogramme">
                    </div>
                    @error('kg')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="price" class="text-sm-medium neutral-1000">Prix (€)</label>
                      <input  type="text" id="price" name="price" value="{{old('price', $request->price)}}" class="form-control" placeholder="prix par kilogramme">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="starts_city" class="text-sm-medium neutral-1000">Ville de depart</label>
                      <input type="text" id="starts_city" name="starts_city" value="{{old('starts_city', $request->starts_city)}}" class="form-control cityInput" placeholder="Ville de depart">
                      <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#303c44; background-color: #fff ; border: 1px solid #fff; max-width: 300px;"></ul>
                    </div>
                    @error('starts_city')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="ends_city" class="text-sm-medium neutral-1000">Ville d'arrivée</label>
                      <input type="text" id="ends_city" name="ends_city" value="{{old('ends_city', $request->ends_city)}}" class="form-control cityInput" placeholder="Ville d'arrivée">
                      <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#303c44; background-color: #fff ; border: 1px solid #fff; max-width: 300px;"></ul>
                    </div>
                    @error('ends_city')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="starts_at" class="text-sm-medium neutral-1000">Date de depart</label>
                      <input type="date" id="starts_at" name="starts_at" value="{{old('starts_at',  $request->starts_at->toDateString())}}" class="form-control cityInput" placeholder="Date de depart">
                    </div>
                    @error('starts_at')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="ends_at" class="text-sm-medium neutral-1000">Date d'arrivée</label>
                      <input type="date" id="ends_at" name="ends_at" value="{{old('ends_at', $request->ends_at ? $request->ends_at->toDateString() : '')}}" class="form-control" placeholder="Date d'arrivée">
                    </div>
                    @error('ends_at')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                  </div>  

                  <div class="col-lg-6">
                    <div class="form-group"> 
                        <label for="m_transport" class="text-sm-medium neutral-1000">Moyen de Transport</label>
                        <select name="m_transport" id="m_transport" class="form-select form-control">
                            <option >Moyen de Transport</option>
                            @foreach ($transports as $transport)
                                <option @if ($request->exists && $request->m_transport == $transport) selected  @endif value="{{$transport}}">{{$transport}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('m_transport')
                        <div class="alert alert-danger" >
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="company" class="text-sm-medium neutral-1000">Compagnie</label>
                      <input type="text" id="company" name="company" value="{{old('company', $request->company)}}" class="form-control" placeholder="compagnie de transport" >
                    </div>
                    @error('company')
                        <div class="alert alert-danger" >
                            {{$message}}
                        </div>
                    @enderror
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label for="description" class="text-sm-medium neutral-1000">Description</label>
                      <textarea name="description" id="description" class="form-control" rows="6" placeholder="Donnez en quelques lignes une expliaction sur votre demande..."> {{old('description', $request->description)}} </textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger" >
                      {{$message}}
                    </div>
                    @enderror
                  </div>
                  
                  <input type="hidden" name="type" value="0">

                  <div class="col-lg-12"> 
                    <button class="btn btn-book"> {{$request->exists ? 'Modifier' : 'Publier'}}
                      <svg width="17" height="16" viewbox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </section>
    <section class="section-box box-media background-body"> 
        <div class="container-media wow fadeInUp"> 
          <img src="{{asset('assets/imgs/page/homepage5/media.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media2.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media3.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media4.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media5.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media6.png')}}" alt="Travila">
          <img src="{{asset('assets/imgs/page/homepage5/media7.png')}}" alt="Travila">
        </div>
    </section>
  </main>
    
@endsection