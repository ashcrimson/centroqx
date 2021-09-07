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
                @include('pacientes.fields',['paciente' => $preparacion->paciente ?? null])
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="col-12">
    <div class="card card-outline card-success" id="fields_preparacion">
        <div class="card-header">
            <h3 class="card-title">Preparación de Medicamento</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">


            <!-- Estado Field -->
            <div class="form-group col-sm-4">
                <label for="estado_id">Estado:</label>
                <multiselect v-model="estado" :options="estados" label="nombre" placeholder="Seleccione uno...">
                </multiselect>
                <input type="hidden" name="estado_id" :value="estado ? estado.id : null">
            </div>


            <!-- Fecha Validez Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_validez', 'Fecha Vigencia:') !!}
                {!! Form::date('fecha_validez', null, ['class' => 'form-control','id'=>'fecha_validez']) !!}
            </div>

            <!-- Fecha Admision Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_admision', 'Fecha Administracion:') !!}
                {!! Form::date('fecha_admision', null, ['class' => 'form-control','id'=>'fecha_admision']) !!}
            </div>


            <!-- Fecha Elaboracion Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('fecha_elaboracion', 'Fecha Elaboracion:') !!}
                {!! Form::date('fecha_elaboracion', null, ['class' => 'form-control','id'=>'fecha_elaboracion']) !!}
            </div>

            <!-- Hora Elaboracion Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('hora_elaboracion', 'Hora Elaboracion:') !!}
                        {!! Form::time('hora_elaboracion', null, ['class' => 'form-control']) !!}
                    </div>

            <!-- Responsable Id Field -->
            <div class="form-group col-sm-4">
                <select-empleado :items="responsables"
                                 v-model="responsable"
                                 label="Profesional a cargo (Q.F)"
                                 :cargo="cargo_quimico"
                                 name="responsable_id"
                                 id="modalSelectQuimico"

                >

                </select-empleado>
            </div>

            <!-- Droga Id Field -->
            <div class="form-group col-sm-4">
                <select-droga :items="drogas" v-model="droga" label="Droga"></select-droga>
            </div>

            <!-- Dosis Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('dosis', 'Dosis:') !!}
                {!! Form::number('dosis', null, ['class' => 'form-control','step' => 'any']) !!}
            </div>

            <!-- Dilucion Id Field -->
            <div class="form-group col-sm-4">
                <select-dilucion :items="diluciones" v-model="dilucion" label="Dilucion"></select-dilucion>
            </div>

            <!-- Volumen Suero Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('volumen_suero', 'Volumen Suero:') !!}
                    {!!
                        Form::select(
                            'volumen_suero',
                            [
                                null => 'Seleccione uno...',
                                0 => 'Sin dilusión',
                                100 => 100,
                                250 => 250,
                                500 => 500,
                                1000 => 1000,
                            ]
                            , null
                            , ['id'=>'volumen_suero','class' => 'form-control','style'=>'width: 100%']
                        )
                    !!}

            </div>

            <!-- Volumen Agregado Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('volumen_agregado', 'Volumen Agregado:') !!}
                {!! Form::number('volumen_agregado', null, ['class' => 'form-control','step' => 'any']) !!}
            </div>

            <!-- Volumen Final Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('volumen_final', 'Volumen Final:') !!}
                {!! Form::number('volumen_final', null, ['class' => 'form-control','step' => 'any']) !!}
            </div>

            <!-- Bajada Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('bajada', 'Bajada:') !!}
                {!!
                    Form::select(
                        'bajada',
                        [
                            '' => "Seleccione una..",
                            'venotek' => 'venotek',
                            'ON-70' => 'ON-70',
                            'Hospira' => 'Hospira',
                            'Jeringa' => 'Jeringa',
                            'Cassette' => 'Cassette',
                        ]
                        , null
                        , ['id'=>'bajada','class' => 'form-control','style'=>'width: 100%']
                    )
                !!}
            </div>

            <!-- Medico Id Field -->
            <div class="form-group col-sm-4">
                <select-empleado :items="medicos"
                                 v-model="medico"
                                 label="Medico"
                                 name="medico_id"
                                 :cargo="cargo_medico"
                                 id="modalSelectMedico"
                >

                </select-empleado>
            </div>

            <!-- Empeado ten -->
            <div class="form-group col-sm-4">
                <select-empleado :items="tens"
                                 v-model="ten"
                                 label="TENS"
                                 name="ten_id"
                                 :cargo="cargo_ten"
                                 id="modalSelectTens"
                >
                </select-empleado>
            </div>

            <!-- Servicio Solicitante Field -->
            <div class="form-group col-sm-4">
                <select-servicio :items="servicios"
                                 v-model="servicio"
                                 label="Servicio Solicitante"
                >

                </select-servicio>
            </div>

            <!-- Protocolo Id Field -->
            <div class="form-group col-sm-4">
                <select-protocolo :items="protocolos" v-model="protocolo" label="Esquema"></select-protocolo>
            </div>

            <!-- Ciclo Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('ciclo', 'Ciclo:') !!}
                {!! Form::text('ciclo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Dia Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('dia', 'Dia:') !!}
                {!! Form::text('dia', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Control Producto Terminado Field -->
            <div class="form-group col-sm-4 col-lg-6">
                {!! Form::label('control_producto_terminado', 'Control Producto Terminado:') !!}
                {!! Form::textarea('control_producto_terminado', null, ['class' => 'form-control','rows' => 4]) !!}
            </div>

            <!-- Entrega Conforme Enfermeria Field -->
            <div class="form-group col-sm-4 col-lg-6">
                {!! Form::label('entrega_conforme_enfermeria', 'Entrega Conforme Enfermeria:') !!}
                {!! Form::textarea('entrega_conforme_enfermeria', null, ['class' => 'form-control','rows' => 4]) !!}
            </div>

            <!-- refrigerar Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('refrigerar', 'Refrigerar:') !!}<br>
                <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="refrigerar" id="refrigerar"
                       value="1"
                        {{ ($preparacion->refrigerar ?? old('refrigerar') ?? false) ? 'checked' : '' }}>
            </div>


            <!-- Proteger Luz Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('proteger_luz', 'Proteger Luz:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="proteger_luz" id="proteger_luz"
                           value="1"
                            {{ ($preparacion->proteger_luz ?? old('proteger_luz') ?? false)  ? 'checked' : '' }}>
                </div>


            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>




@push('scripts')
    <script>


        const vmPreparacionFields = new Vue({
            el: '#fields_preparacion',
            name: 'fields_preparacion',
            created() {

            },
            data: {
                loading : false,
                drogas: @json(\App\Models\Droga::all() ?? []),
                droga: @json($preparacion->droga ?? \App\Models\Droga::find(old('droga_id')) ?? null),

                diluciones: @json(\App\Models\Dilucion::all() ?? []),
                dilucion: @json($preparacion->dilucion ?? \App\Models\Dilucion::find(old('dilucion_id')) ?? null),

                protocolos: @json(\App\Models\Protocolo::all() ?? []),
                protocolo: @json($preparacion->protocolo ?? \App\Models\Protocolo::find(old('protocolo_id')) ?? null),

                responsables: @json(\App\Models\Empleado::quimico()->get() ?? []),
                responsable: @json($preparacion->responsable ?? \App\Models\Empleado::find(old('responsable_id')) ?? null),

                medicos: @json(\App\Models\Empleado::medico()->get() ?? []),
                medico: @json($preparacion->medico ?? \App\Models\Empleado::find(old('medico_id')) ?? null),

                tens: @json(\App\Models\Empleado::ten()->get() ?? []),
                ten: @json($preparacion->ten ?? \App\Models\Empleado::find(old('ten_id')) ?? null),

                cargo_quimico: @json(\App\Models\Cargo::find(\App\Models\Cargo::QUIMICO_FARMACEUTICO)),
                cargo_medico: @json(\App\Models\Cargo::find(\App\Models\Cargo::MEDICO)),
                cargo_ten: @json(\App\Models\Cargo::find(\App\Models\Cargo::TEN)),

                servicios: @json(\App\Models\Servicio::all() ?? []),
                servicio: @json($preparacion->servicio ?? \App\Models\Servicio::find(old('servicio_id')) ?? null),

                estados: @json(\App\Models\PreparacionEstado::all() ?? []),
                estado: @json($preparacion->estado ?? \App\Models\PreparacionEstado::find(old('estado_id')) ?? null),

            },
            methods: {
                setDatosPreparacion(preparacion){
                    logI('set datos ultima preparacion paciente',preparacion);

                    if(preparacion){
                        this.droga =preparacion.droga;
                        this.dilucion =preparacion.dilucion;
                        this.protocolo =preparacion.protocolo;
                        this.responsable =preparacion.responsable;
                        this.medico =preparacion.medico;
                        this.ten =preparacion.ten;
                        this.servicio =preparacion.servicio;
                        this.estado =preparacion.estado;


                        $("#fecha_validez").val(preparacion.fecha_validez);
                        $("#fecha_admision").val(preparacion.fecha_admision);
                        $("#fecha_elaboracion").val(preparacion.fecha_elaboracion);
                        $("#hora_elaboracion").val(preparacion.hora_elaboracion);

                        $("#dosis").val(preparacion.dosis);
                        $("#volumen_suero").val(preparacion.volumen_suero);
                        $("#volumen_agregado").val(preparacion.volumen_agregado);
                        $("#volumen_final").val(preparacion.volumen_final);
                        $("#bajada").val(preparacion.bajada);
                        $("#ciclo").val(preparacion.ciclo);
                        $("#dia").val(preparacion.dia);
                        $("#control_producto_terminado").val(preparacion.control_producto_terminado);
                        $("#entrega_conforme_enfermeria").val(preparacion.entrega_conforme_enfermeria);

                        if (preparacion.refrigerar=='1'){
                            $('#refrigerar').bootstrapToggle('on')
                        }else {
                            $("#refrigerar").bootstrapToggle('off');
                        }

                        if (preparacion.proteger_luz=='1'){
                            $('#proteger_luz').bootstrapToggle('on')
                        }else {
                            $("#proteger_luz").bootstrapToggle('off');
                        }


                    }
                }

            }
        });
    </script>
@endpush
