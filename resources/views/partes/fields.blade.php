<div class="col-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">Datos Personales</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div> 
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">
                @include('pacientes.fields',['paciente' => $parte->paciente ?? null])
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-12">
    <div class="card card-outline card-success" id="fields_preparacion">
        <div class="card-header">
            <h3 class="card-title">Datos Parte</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">

        @can('medico')
            <!-- Tipo Cirugia Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tipo_cirugia', 'Tipo Cirugia:') !!}
                {!! Form::select('tipo_cirugia', ['opcion1' => 'opcion1', 'opcion2' => 'opcion2', 'opcion3' => 'opcion3'], null, ['class' => 'form-control custom-select']) !!}
            </div>

             <!-- Diagnostico Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('diagnostico', 'Diagnostico:') !!}
                {!! Form::text('diagnostico', null, ['class' => 'form-control']) !!}
            </div>


            <!-- Otro Diagnostico Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('otro_diagnostico', 'Otro Diagnostico:') !!}
                {!! Form::text('otro_diagnostico', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Intervencion Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('intervencion', 'Intervencion:') !!}
                {!! Form::text('intervencion', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Lateralidad Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('lateralidad', 'Lateralidad:') !!}
                {!! Form::select('lateralidad', ['no_aplica' => 'no_aplica', 'si_aplica' => 'si_aplica'], null, ['class' => 'form-control custom-select']) !!}
            </div>

            <!-- Otra Intervencion Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('otra_intervencion', 'Otra Intervencion:') !!}
                {!! Form::text('otra_intervencion', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Cma Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('cma', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('cma', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('cma', 'Cma', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Tiempo Quirurgico Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('tiempo_quirurgico', 'Tiempo Quirurgico:') !!}
                {!! Form::select('tiempo_quirurgico', ['30' => '30', '60' => '60', '120' => '120', '300' => '300'], null, ['class' => 'form-control custom-select']) !!}
            </div>

            <!-- Anestecia Sugerida Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('anestecia_sugerida', 'Anestecia Sugerida:') !!}
                {!! Form::text('anestecia_sugerida', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Aislamiento Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('aislamiento', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('aislamiento', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('aislamiento', 'Aislamiento', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Alergia Latex Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('alergia_latex', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('alergia_latex', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('alergia_latex', 'Alergia Latex', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Usuario Taco Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('usuario_taco', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('usuario_taco', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('usuario_taco', 'Usuario Taco', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Necesidad Cama Upc Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('necesidad_cama_upc', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('necesidad_cama_upc', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('necesidad_cama_upc', 'Necesidad Cama Upc', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Prioridad Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('prioridad', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('prioridad', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('prioridad', 'Prioridad', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Necesita Donantes Sangre Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('necesita_donantes_sangre', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('necesita_donantes_sangre', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('necesita_donantes_sangre', 'Necesita Donantes Sangre', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Evaluacion Preanestesica Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('evaluacion_preanestesica', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('evaluacion_preanestesica', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('evaluacion_preanestesica', 'Evaluacion Preanestesica', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Equipo Rayos Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('equipo_rayos', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('equipo_rayos', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('equipo_rayos', 'Equipo Rayos', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Insumos Especificos Field -->
            <div class="form-group col-sm-4">
                <div class="form-check">
                    {!! Form::hidden('insumos_especificos', 0, ['class' => 'form-check-input']) !!}
                    {!! Form::checkbox('insumos_especificos', 'si', null, ['class' => 'form-check-input']) !!}
                    {!! Form::label('insumos_especificos', 'Insumos Especificos', ['class' => 'form-check-label']) !!}
                </div>
            </div>

            <!-- Ex Preoperatorios Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('ex_preoperatorios', 'Ex Preoperatorios:') !!}
                {!! Form::select('ex_preoperatorios', ['opcion1' => 'opcion1', 'opcion2' => 'opcion2'], null, ['class' => 'form-control custom-select']) !!}
            </div>

            <!-- Biopsia Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('biopsia', 'Biopsia:') !!}
                {!! Form::select('biopsia', ['no_aplica' => 'no_aplica', 'si_aplica' => 'si_aplica'], null, ['class' => 'form-control custom-select']) !!}
            </div>

            <!-- Instrumental Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('instrumental', 'Instrumental:') !!}
                {!! Form::text('instrumental', null, ['class' => 'form-control']) !!}
            </div>
            @endcan

            <!-- Especialidad Field -->
            @can('admision')
            <div class="form-group col-sm-4">
                {!! Form::label('especialidad', 'Especialidad:') !!}
                {!! Form::select('especialidad', ['Trauma' => 'Trauma', 'Cardiología' => 'Cardiología', 'Etc' => 'Etc'], null, ['class' => 'form-control custom-select']) !!}
            </div>
            @endcan

            <!-- Medicamentos Field -->
            @can('admision')
            <div class="form-group col-sm-4">
                {!! Form::label('medicamentos', 'Medicamentos:') !!}
                {!! Form::text('medicamentos', null, ['class' => 'form-control']) !!}
            </div>
            @endcan


            <!-- Observaciones Field -->
            @can('admision')
            <div class="form-group col-sm-4">
                {!! Form::label('observaciones', 'Observaciones:') !!}
                {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
            </div>
            @endcan


            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
</div>
