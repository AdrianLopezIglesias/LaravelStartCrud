

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('salon_horarios.table')

            </div>

						<section class="content-header">
							<div class="container-fluid">
									<div class="row mb-2">
											<div class="col-sm-6">
											</div>
											<div class="col-sm-6">
													<a class="btn btn-primary float-right"
														 href="{{ route('salonHorarios.create') }}">
															Add New
													</a>
											</div>
									</div>
							</div>
					</section>
        </div>
    </div>
