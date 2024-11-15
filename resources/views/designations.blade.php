@extends('layouts.app')

@push('page-css')

@endpush

@push('breadcrumb')
<h3 class="content-header-title">Titujt e Pozicioneve</h3>
<div class="row breadcrumbs-top">
	<div class="breadcrumb-wrapper col-12">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
			</li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Titulli</a>
			</li>
			<li class="breadcrumb-item active">Të Gjithë Titujt e Pozicioneve
			</li>
		</ol>
	</div>
</div>
@endpush

@push('breadcrumb-button')
<x-buttons.primary :text="'Shto Titull Pozicioni'" :target="'#add-designation'" />
@endpush

@section('content')

<!-- HTML5 export buttons table -->
<section id="html5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Lista e Titujve të Pozicioneve</h4>
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
                        <th>Emri i Titullit të Pozicionit</th>
                        <th>Veprimi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (!empty($designations->count()))
                        @foreach ($designations as $designation)
                          <tr>
                            <td>{{$designation->title}}</td>
                            <td>
                              <a href="#" class="float-md-right" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu">
                                  <a href="javascript:void(0)" data-id="{{$designation->id}}" data-title="{{$designation->title}}" class="dropdown-item editbtn">
                                  <i class="la la-edit"></i>Ndrysho
                                </a>
                                  <div class="dropdown-divider"></div>
                                  <a data-id="{{$designation->id}}" href="javascript:void(0)" aria-haspopup="true" data-toggle="modal"  aria-expanded="true" class="dropdown-item deletebtn">
                                  <i class="la la-trash"></i>Fshi
                                </a>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                        <x-modals.delete :route="'designation.destroy'" :title="'Titulli i Pozicionit të Stafit'" />
                        <!-- edit designation modal starts here -->
                        <div class="modal wobble text-left" id="edit-designation" tabindex="-1" role="dialog" aria-labelledby="AddCustomer" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <label class="modal-title text-text-bold-600" id="myModalLabel33">Ndrysho Titullin e Pozicionit të Stafit</label>
                                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Mbyll">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="{{route('designations')}}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                  <input type="hidden" name="id" id="edit_id">
                                  <label>Emri i Titullit të Pozicionit: </label>
                                  <div class="form-group">
                                    <input type="text" placeholder="Shkruaj emrin e titullit të pozicionit" name="title" class="form-control edit_title">
                                  </div>

                                <div class="modal-footer">
                                  <button type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal">Mbyll</button>						
                                  <button type="submit" name="add_designation" class="btn btn-outline-primary btn-lg">Dërgo</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- edit designation modal ends here -->
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


<!-- add designation modal starts here -->
<div class="modal wobble text-left" id="add-designation" tabindex="-1" role="dialog" aria-labelledby="AddCustomer" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Shto Titull Pozicioni të Stafit</label>
        <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Mbyll">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('designations')}}">
        @csrf
        <div class="modal-body">
          <label>Emri i Titullit të Pozicionit: </label>
          <div class="form-group">
            <input type="text" placeholder="Shkruaj emrin e titullit të pozicionit" name="title" class="form-control">
          </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal">Mbyll</button>						
          <button type="submit" name="add_designation" class="btn btn-outline-primary btn-lg">Dërgo</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- add designation modal ends here -->                    
@endsection


@push('page-js')
<script>
  $(document).ready(function (){
    $('.editbtn').on('click',function (){
      $('#edit-designation').modal('show');
      var id = $(this).data('id');
      var title = $(this).data('title');
      $('#edit_id').val(id);
      $('.edit_title').val(title);
    })
  })
</script>
@endpush
