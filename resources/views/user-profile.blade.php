@php
	$title = "Profili i Përdoruesit";
@endphp
@extends('layouts.app')

@push('page-css')
	
@endpush

@push('breadcrumb')
<h3 class="content-header-title">Profili i Përdoruesit</h3>
<div class="row breadcrumbs-top">
  <div class="breadcrumb-wrapper col-12">
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
	  </li>
	  <li class="breadcrumb-item"><a href="{{route('users')}}">Users</a>
	  </li>
	  <li class="breadcrumb-item active">Profili i Përdoruesit
	  </li>
	</ol>
  </div>
</div>
@endpush

@section('content')
	<!-- Faqja e Cilësimeve të Llogarisë fillon -->
	<section id="page-account-settings">
		<div class="row">
			<!-- seksioni i menysë në të majtë -->
			<div class="col-md-3 mb-2 mb-md-0">
				<ul class="nav nav-pills flex-column mt-md-0 mt-1">
					<li class="nav-item">
						<a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
							href="#account-vertical-general" aria-expanded="true">
							<i class="ft-globe mr-50"></i>
							Përgjithshme
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" id="account-pill-password" data-toggle="pill" href="#account-vertical-password"
							aria-expanded="false">
							<i class="ft-lock mr-50"></i>
							Ndrysho Fjalëkalimin
						</a>
					</li>
				</ul>
			</div>
			<!-- seksioni i përmbajtjes në të djathtë -->
			<div class="col-md-9">
				<div class="card">
					<div class="card-content">
						<div class="card-body">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="account-vertical-general"
									aria-labelledby="account-pill-general" aria-expanded="true">
									
									<div class="media">
										<a href="javascript: void(0);">
											<img src="@if(!empty(auth()->user()->avatar)){{asset('storage/avatars/'.auth()->user()->avatar)}}@else {{asset('app-assets/images/portrait/small/avatar-s-1.png')}} @endif" class="rounded mr-75" alt="imazhi i profilit" height="64" width="64">
										</a>
										<div class="media-body mt-75">
											<div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
												<label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
													for="account-upload">Ngarko foto të re</label>
											</div>
										</div>
									</div>
									<hr>
									<form method="post" enctype="multipart/form-data" action="{{route('user-profile')}}">
										@method("PUT")
										@csrf
										<div class="row">
											<input type="file" value="{{auth()->user()->avatar}}" name="avatar" id="account-upload" hidden>
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-username">Emri i Përdoruesit</label>
														<input type="text" class="form-control" id="account-username"
															placeholder="Emri i Përdoruesit" name="username" value="{{auth()->user()->username}}" >
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-name">Emri i Plotë</label>
														<input name="name" type="text" class="form-control" id="account-name"
															placeholder="Emri i Plotë" value="{{auth()->user()->name}}" >
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-e-mail">Email</label>
														<input name="email" type="email" class="form-control" id="account-e-mail"
															placeholder="Email" value="{{auth()->user()->email}}" >
													</div>
												</div>
											</div>
											<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
												<button type="submit" name="update_info" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Ruaj ndryshimet</button>
												<button type="reset" class="btn btn-light">Anulo</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
									aria-labelledby="account-pill-password" aria-expanded="false">
									<form method="post" action="{{route('user-profile')}}">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-old-password">Fjalëkalimi i Vjetër</label>
														<input name="old_password" type="password" class="form-control"
															id="account-old-password" placeholder="Fjalëkalimi i Vjetër">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-new-password">Fjalëkalimi i Ri</label>
														<input type="password" name="password" id="account-new-password"
															class="form-control" placeholder="Fjalëkalimi i Ri">
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
													<div class="controls">
														<label for="account-retype-new-password">Rifutni Fjalëkalimin e Ri</label>
														<input type="password" name="password_confirmation" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
												<button type="submit" name="update_password" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Ruaj ndryshimet</button>
												<button type="reset" class="btn btn-light">Anulo</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Faqja e Cilësimeve të Llogarisë përfundon -->
@endsection


@push('page-js')
	
@endpush
