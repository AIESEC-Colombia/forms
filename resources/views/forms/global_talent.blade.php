@extends('layout.template')

@section('content')
    <div class="container-fluid bg-talent">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-10">
                <div class="form-step" id="form-step">
                    <h2 class="header" id="title" style="color: #fff">@lang('forms.talent')</h2>
                    <p style="color: #fff">@lang('forms.talent_message')</p>
                    <fieldset class="step" data-step="0">
                        <div class="input-group">
                            <label for="">@lang('forms.first_name')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text"
                                   class="form-control"
                                   name="first_name"
                                   id="first_name"
                                   value=""
                                   data-validated="required"
                                   placeholder="@lang('forms.first_name')"
                                   title="@lang('forms.first_name')">
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.last_name')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text"
                                   class="form-control"
                                   name="last_name"
                                   id="last_name"
                                   value=""
                                   data-validated="required"
                                   placeholder="@lang('forms.last_name')"
                                   title="@lang('forms.last_name')">
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.phone')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                            class="fa fa-phone-square"></i></span>
                            </div>
                            <input type="number"
                                   class="form-control"
                                   name="phone"
                                   id="phone"
                                   value=""
                                   data-validated="required,numeric,min,max"
                                   placeholder="@lang('forms.phone')"
                                   data-min="7"
                                   data-max="10"
                                   title="@lang('forms.phone')">
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                             </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.cellphone')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                            class="fa fa-phone-square"></i></span>
                            </div>
                            <input type="number"
                                   class="form-control"
                                   name="cellphone"
                                   id="cellphone"
                                   value=""
                                   data-validated="required,numeric,min,max"
                                   data-min="7"
                                   data-max="10"
                                   placeholder="@lang('forms.cellphone')"
                                   title="@lang('forms.cellphone')">
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.mail')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   id="email"
                                   value=""
                                   data-validated="required,email"
                                   placeholder="@lang('forms.mail')"
                                   title="@lang('forms.mail')">
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.password')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                            </div>
                            <input type="password"
                                   class="form-control"
                                   name="password"
                                   id="password"
                                   value=""
                                   data-validated="required,password"
                                   placeholder="@lang('forms.password')"
                                   title="@lang('forms.password')">
                            <span class="invalid-feedback text-left" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.password_confirmation')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock"></i></span>
                            </div>
                            <input type="password"
                                   class="form-control"
                                   name="password_confirm"
                                   id="password_confirm"
                                   value=""
                                   data-validated="required,confirm"
                                   data-confirm="password"
                                   placeholder="@lang('forms.password_confirmation')"
                                   title="@lang('forms.password_confirmation')">
                            <span class="invalid-feedback text-left" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                        <div class="form-group d-flex justify-content-between mt-2">
                            <button class="btn btn-primary btn-sm btn-cancel" id="cancel">
                                <i class="fas fa-ban"></i> Cancelar
                            </button>
                            <button class="btn btn-primary btn-sm next btn-entrepreneur" data-next="1">
                                Siguiente <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </fieldset>
                    <fieldset class="step" data-step="1">
                        <div class="input-group">
                            <label for="">@lang('forms.university')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="university"
                                    id="university"
                                    placeholder="@lang('forms.university')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'universidad'])</option>
                                @foreach($universities as $university)
                                    <option value="{{$university->id}}">{{$university->value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.organization')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="organization"
                                    id="organization"
                                    placeholder="@lang('forms.organization')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'cómo conoció AIESEC'])</option>
                                @foreach($organization as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.activities')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="activities"
                                    id="activities"
                                    placeholder="@lang('forms.activities')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'activities'])</option>
                                @foreach($activities as $activity)
                                    <option value="{{$activity['name']}}">{{$activity['name']}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.travel_date')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="travel_date"
                                    id="travel_date"
                                    placeholder="@lang('forms.travel_date')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'cuando crees que sería la fecha de viaje'])</option>
                                @foreach($travel_date as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.preference_contact')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="preference_contact"
                                    id="preference_contact"
                                    placeholder="@lang('forms.preference_contact')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'preferencia de Contacto'])</option>
                                @foreach($preference_contact as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.english_level')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="english_level"
                                    id="english_level"
                                    placeholder="@lang('forms.english_level')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'nivel de ingles'])</option>
                                @foreach($english_level as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.experience')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="experience"
                                    id="experience"
                                    placeholder="@lang('forms.experience')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'experiencia'])</option>
                                @foreach($experience as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.career')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="career"
                                    id="career"
                                    placeholder="@lang('forms.career')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'carrera'])</option>
                                @foreach($career as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="input-group">
                            <label for="">@lang('forms.semester')*</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-list"></i></span>
                            </div>
                            <select class="custom-select"
                                    name="semester"
                                    id="semester"
                                    placeholder="@lang('forms.semester')"
                                    data-validated="required">
                                <option selected
                                        value="">@lang('forms.list_message',['field' => 'semestre'])</option>
                                @foreach($semester as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback text-left" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="terms">
                            <label class="custom-control-label" for="terms">
                            </label>
                            <label for="">
                                @lang('forms.first_terms_message')
                                <a id="btn-term" class="text-secondary"> @lang('forms.last_terms_message')</a>
                            </label>
                        </div>
                        <div class="form-group d-flex justify-content-between mt-2">
                            <button class="btn btn-primary btn-sm previous btn-entrepreneur" data-previous="0">
                                <i class="fas fa-arrow-left"></i> Anterior
                            </button>
                            <button class="btn btn-primary btn-sm btn-entrepreneur" id="submit">
                                Enviar <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection
