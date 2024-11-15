@extends('layouts.app')

@push('page-css')

@endpush

@push('breadcrumb')
<h3 class="content-header-title">Klientët</h3>
<div class="row breadcrumbs-top">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Klientët</a>
            </li>
            <li class="breadcrumb-item active">Të Gjithë Klientët
            </li>
        </ol>
    </div>
</div>
@endpush

@push('breadcrumb-button')
<x-buttons.primary :text="'Shto Klient'" :target="'#add-customer'" />
@endpush

@section('content')

<!-- HTML5 export buttons table -->
<section id="html5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Lista e Klientëve</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              
                <table class="table table-striped table-bordered dataex-html5-export">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Emri i Plotë</th>
                        <th>Adresa</th>
                        <th>Numri i Telefonit</th>
                        <th>Gjinia</th>
                        <th>Veprimi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!empty($customers->count()))
                        @foreach ($customers as $customer)
                          <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->fullname}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->gender}}</td>
                            <td>
                              <a href="#" class="float-md-right" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu">
                                  <a href="javascript:void(0)" data-id="{{$customer->id}}" class="dropdown-item">
                                  <i class="la la-edit"></i>Ndrysho
                                </a>
                                  <div class="dropdown-divider"></div>
                                  <a data-id="{{$customer->id}}" href="javascript:void(0)" aria-haspopup="true" data-toggle="modal"  aria-expanded="true" class="dropdown-item deletebtn">
                                  <i class="la la-trash"></i>Fshi
                                </a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        <x-modals.delete :route="'customer.destroy'" :title="'Klienti'" />
                    @endif                    
                  </tbody>
                  
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ HTML5 export buttons table -->


<!-- add customer modal starts here -->
<div class="modal wobble text-left" id="add-customer" tabindex="-1" role="dialog" aria-labelledby="AddCustomer" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title text-text-bold-600" id="myModalLabel33">Shto Klient</h3>
            <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Mbyll">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="{{route('customers')}}">
          @csrf
            <div class="modal-body">
                <label>Emri i Plotë: </label>
                <div class="form-group">
                    <input type="text" placeholder="Shkruaj emrin e plotë të klientit" name="fullname" class="form-control">
                </div>

                <label>Adresa: </label>
                <div class="form-group">
                    <input type="text" placeholder="Shkruaj adresën e klientit" name="address" class="form-control">
                </div>

                <label>Telefoni: </label>
                <div class="form-group">
                    <input type="text" placeholder="Shkruaj numrin e telefonit të klientit" name="phone" class="form-control">
                </div>

                <label>Qyteti: </label>
                <div class="form-group">
                    <input type="text" placeholder="Shkruaj qytetin e klientit" name="city" class="form-control">
                </div>

                <label>Email: </label>
                <div class="form-group">
                    <input type="text" placeholder="Shkruaj emailin e klientit" name="email" class="form-control">
                </div>

                <label>Komenti: </label>
                <div class="form-group">
                    <textarea name="comment" placeholder="Shkruaj komentin për klientin" class="form-control"></textarea>
                </div>

                <label>Gjinia: </label>
                <div class="form-group">
                    <select name="gender" title="Zgjidh Gjininë" class="select2 form-control">
                        <optgroup>
                            <option value="Male">Mashkull</option>
                            <option value="Female">Femër</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Mbyll">
                <input type="submit" class="btn btn-outline-primary btn-lg" value="Dërgo" name="add_customer">
            </div>
        </form>
    </div>
</div>
</div>                    
@endsection


@push('page-js')

@endpush
