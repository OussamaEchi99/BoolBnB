@extends('layouts.app')

@section('content')

    <section id="host-dashboard">
        <div class="container">
        
            {{-- Title --}}
            <h1>Benvenuto nell'area HOST</h1>
        
            <section class="dashboard-internal-section">
                {{-- Fast Actions --}}
                <h3>Azioni rapide</h3>
            
                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col">
                        <a class="fast-actions-btn" href="{{ route('host.locations.create') }}">
                            <span class="fast-action-icon"><i class="fa-solid fa-plus"></i></span>Aggiungi un post
                        </a>
                    </div>
                    <div class="col">
                        <a class="fast-actions-btn" href="{{ route('host.sponsors') }}">
                            <span class="fast-action-icon"><i class="fa-solid fa-money-bill-trend-up"></i></span>Sponsorizza un post
                        </a>
                    </div>
                </div>
            </section>

            {{-- Account Actions --}}
            <section class="dashboard-internal-section">
                <h3>Il tuo accout</h3>
        
                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col">
                        <a class="fast-actions-btn" href="{{ route('host.locations.create') }}">
                            <span class="fast-action-icon"><i class="fa-solid fa-plus"></i></span>Aggiungi un post
                        </a>
                    </div>
                    <div class="col">
                        <a class="fast-actions-btn" href="{{ route('host.sponsors') }}">
                            <span class="fast-action-icon"><i class="fa-solid fa-money-bill-trend-up"></i></span>Sponsorizza un post
                        </a>
                    </div>
                    <div class="col offset-3 offset-md-3">
                        <a class="fast-actions-btn" href="{{ route('host.sponsors') }}">
                            <span class="fast-action-icon"><i class="fa-solid fa-money-bill-trend-up"></i></span>Sponsorizza un post
                        </a>
                    </div>
                </div>
            </section>

            <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body">
                    Hello, world! This is a toast message.
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
        
            
        
        </div>
    </section>

@endsection