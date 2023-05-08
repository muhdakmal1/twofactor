@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-body">
        {{ trans('global.edit') }} {{ trans('cruds.ekadManagement.title_singular') }}
        <hr>
        <form action="{{ route("admin.kads.update", [$customer->id]) }}" method="POST" enctype="multipart/form-data">
            <input name="customer_id" value="{{ $customer->id }}" hidden/>
            <input name="customer_name" value="{{ $customer->template->customer_name }}" hidden/>
            @csrf
            {{-- @method('PUT') --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="customer_name">{{ trans('cruds.ekadManagement.fields.name') }} <span style="color:red">*</span></label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ old('name', isset($customer) ? $customer->template->customer_name : '') }}" disabled>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.ekadManagement.fields.name_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="customer_email">{{ trans('cruds.ekadManagement.fields.email') }} <span style="color:red">*</span></label>
                            <input type="text" id="customer_email" name="customer_email" class="form-control" value="{{ old('email', isset($customer) ? $customer->email : '') }}" disabled>
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.ekadManagement.fields.email_helper') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('couple_name') ? 'has-error' : '' }}">
                            <label for="couple_name">{{ trans('cruds.ekadManagement.kad_fields.couple_name') }} <span style="color:red">*</span></label>
                            <input type="text" id="couple_name" name="couple_name" class="form-control" value="{{ old('couple_name', isset($customer) ? $customer->template->couple_name : '') }}" required>
                            @if($errors->has('couple_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('couple_name') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('father_name') ? 'has-error' : '' }}">
                            <label for="father_name">{{ trans('cruds.ekadManagement.kad_fields.father_name') }} <span style="color:red">*</span></label>
                            <input type="text" id="father_name" name="father_name" class="form-control" value="{{ old('father_name', isset($customer) ? $customer->template->father_name : '') }}" required>
                            @if($errors->has('father_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('father_name') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('mother_name') ? 'has-error' : '' }}">
                            <label for="mother_name">{{ trans('cruds.ekadManagement.kad_fields.mother_name') }} <span style="color:red">*</span></label>
                            <input type="text" id="mother_name" name="mother_name" class="form-control" value="{{ old('mother_name', isset($customer) ? $customer->template->mother_name : '') }}" required>
                            @if($errors->has('mother_name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('mother_name') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div class="col-md-12 container mb-3">
                        <img style="width: 200px" src="{{asset($customer->template->url_img)}}">
                    </div>
                    <div class="col-md-12">
                        <div class="file-input form-group {{ $errors->has('url_img') ? 'has-error' : '' }}" style="text-align: center;">
                            {{-- <label for="url_img">{{ trans('cruds.ekadManagement.kad_fields.url_img') }}*</label> --}}
                            {{-- <input type="text" id="url_img" name="url_img" class="form-control" value="{{ old('url_img', isset($customer) ? $customer->template->url_img : '') }}" hidden> --}}
                            
                            <input type="file" id="url_img2" name="url_img2" class="file-input__input form-control" value="{{ old('url_img', isset($customer) ? $customer->template->url_img : '') }}">
                            <label class="file-input__label" for="url_img2">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                                ></path>
                                </svg>
                                <span>Upload file</span>
                            </label>
                            @if($errors->has('url_img'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('url_img') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.url_img_helper') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('intro_desc') ? 'has-error' : '' }}">
                            <label for="intro_desc">{{ trans('cruds.ekadManagement.kad_fields.intro_desc') }} <span style="color:red">*</span></label>
                            <input type="text" id="intro_desc" name="intro_desc" class="form-control" value="{{ old('intro_desc', isset($customer) ? $customer->template->intro_desc : '') }}" required>
                            @if($errors->has('intro_desc'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('intro_desc') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('location_short') ? 'has-error' : '' }}">
                            <label for="location_short">{{ trans('cruds.ekadManagement.kad_fields.location_short') }} <span style="color:red">*</span></label>
                            <input type="text" id="location_short" name="location_short" class="form-control" value="{{ old('location_short', isset($customer) ? $customer->template->location_short : '') }}" required>
                            @if($errors->has('location_short'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('location_short') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('time_event1') ? 'has-error' : '' }}">
                            <label for="time_event1">{{ trans('cruds.ekadManagement.kad_fields.time_event1') }} <span style="color:red">*</span></label>
                            <input type="text" id="time_event1" name="time_event1" class="form-control" value="{{ old('time_event1', isset($customer) ? $customer->template->time_event1 : '') }}" required>
                            @if($errors->has('time_event1'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('time_event1') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('time_event2') ? 'has-error' : '' }}">
                            <label for="time_event2">{{ trans('cruds.ekadManagement.kad_fields.time_event2') }} <span style="color:red">*</span></label>
                            <input type="text" id="time_event2" name="time_event2" class="form-control" value="{{ old('time_event2', isset($customer) ? $customer->template->time_event2 : '') }}" required>
                            @if($errors->has('time_event2'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('time_event2') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('time_event3') ? 'has-error' : '' }}">
                            <label for="time_event3">{{ trans('cruds.ekadManagement.kad_fields.time_event3') }} <span style="color:red">*</span></label>
                            <input type="text" id="time_event3" name="time_event3" class="form-control" value="{{ old('time_event3', isset($customer) ? $customer->template->time_event3 : '') }}" required>
                            @if($errors->has('time_event3'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('time_event3') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('date_event') ? 'has-error' : '' }}" id="datetimepicker1">
                            <label for="date_event">{{ trans('cruds.ekadManagement.kad_fields.date_event') }} <span style="color:red">*</span></label>
                            <input type="text" id="date_event" name="date_event" class="form-control" value="{{ old('date_event', isset($customer) ? $customer->template->date_event : '') }}" required>
                            @if($errors->has('date_event'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('date_event') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('timedec_event1') ? 'has-error' : '' }}">
                            <label for="timedec_event1">{{ trans('cruds.ekadManagement.kad_fields.timedec_event1') }} <span style="color:red">*</span></label>
                            <input type="text" id="timedec_event1" name="timedec_event1" class="form-control" value="{{ old('timedec_event1', isset($customer) ? $customer->template->timedec_event1 : '') }}" required>
                            @if($errors->has('timedec_event1'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('timedec_event1') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('timedec_event2') ? 'has-error' : '' }}">
                            <label for="timedec_event2">{{ trans('cruds.ekadManagement.kad_fields.timedec_event2') }} <span style="color:red">*</span></label>
                            <input type="text" id="timedec_event2" name="timedec_event2" class="form-control" value="{{ old('timedec_event2', isset($customer) ? $customer->template->timedec_event2 : '') }}" required>
                            @if($errors->has('timedec_event2'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('timedec_event2') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('timedec_event3') ? 'has-error' : '' }}">
                            <label for="timedec_event3">{{ trans('cruds.ekadManagement.kad_fields.timedec_event3') }} <span style="color:red">*</span></label>
                            <input type="text" id="timedec_event3" name="timedec_event3" class="form-control" value="{{ old('timedec_event3', isset($customer) ? $customer->template->timedec_event3 : '') }}" required>
                            @if($errors->has('timedec_event3'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('timedec_event3') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_person1') ? 'has-error' : '' }}">
                            <label for="contact_person1">{{ trans('cruds.ekadManagement.kad_fields.contact_person1') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_person1" name="contact_person1" class="form-control" value="{{ old('contact_person1', isset($customer) ? $customer->template->contact_person1 : '') }}" required>
                            @if($errors->has('contact_person1'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_person1') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_person2') ? 'has-error' : '' }}">
                            <label for="contact_person2">{{ trans('cruds.ekadManagement.kad_fields.contact_person2') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_person2" name="contact_person2" class="form-control" value="{{ old('contact_person2', isset($customer) ? $customer->template->contact_person2 : '') }}" required>
                            @if($errors->has('contact_person2'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_person2') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_person3') ? 'has-error' : '' }}">
                            <label for="contact_person3">{{ trans('cruds.ekadManagement.kad_fields.contact_person3') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_person3" name="contact_person3" class="form-control" value="{{ old('contact_person3', isset($customer) ? $customer->template->contact_person3 : '') }}" required>
                            @if($errors->has('contact_person3'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_person3') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_person4') ? 'has-error' : '' }}">
                            <label for="contact_person4">{{ trans('cruds.ekadManagement.kad_fields.contact_person4') }}</label>
                            <input type="text" id="contact_person4" name="contact_person4" class="form-control" value="{{ old('contact_person4', isset($customer) ? $customer->template->contact_person4 : '') }}">
                            @if($errors->has('contact_person4'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_person4') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_no1') ? 'has-error' : '' }}">
                            <label for="contact_no1">{{ trans('cruds.ekadManagement.kad_fields.contact_no1') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_no1" name="contact_no1" class="form-control" value="{{ old('contact_no1', isset($customer) ? $customer->template->contact_no1 : '') }}" required>
                            @if($errors->has('contact_no1'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_no1') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_no2') ? 'has-error' : '' }}">
                            <label for="contact_no2">{{ trans('cruds.ekadManagement.kad_fields.contact_no2') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_no2" name="contact_no2" class="form-control" value="{{ old('contact_no2', isset($customer) ? $customer->template->contact_no2 : '') }}" required>
                            @if($errors->has('contact_no2'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_no2') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_no3') ? 'has-error' : '' }}">
                            <label for="contact_no3">{{ trans('cruds.ekadManagement.kad_fields.contact_no3') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_no3" name="contact_no3" class="form-control" value="{{ old('contact_no3', isset($customer) ? $customer->template->contact_no3 : '') }}" required>
                            @if($errors->has('contact_no3'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_no3') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_no4') ? 'has-error' : '' }}">
                            <label for="contact_no4">{{ trans('cruds.ekadManagement.kad_fields.contact_no4') }}</label>
                            <input type="text" id="contact_no4" name="contact_no4" class="form-control" value="{{ old('contact_no4', isset($customer) ? $customer->template->contact_no4 : '') }}">
                            @if($errors->has('contact_no4'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_no4') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_relation1') ? 'has-error' : '' }}">
                            <label for="contact_relation1">{{ trans('cruds.ekadManagement.kad_fields.contact_relation1') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_relation1" name="contact_relation1" class="form-control" value="{{ old('contact_relation1', isset($customer) ? $customer->template->contact_relation1 : '') }}" required>
                            @if($errors->has('contact_relation1'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_relation1') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_relation2') ? 'has-error' : '' }}">
                            <label for="contact_relation2">{{ trans('cruds.ekadManagement.kad_fields.contact_relation2') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_relation2" name="contact_relation2" class="form-control" value="{{ old('contact_relation2', isset($customer) ? $customer->template->contact_relation2 : '') }}" required>
                            @if($errors->has('contact_relation2'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_relation2') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_relation3') ? 'has-error' : '' }}">
                            <label for="contact_relation3">{{ trans('cruds.ekadManagement.kad_fields.contact_relation3') }} <span style="color:red">*</span></label>
                            <input type="text" id="contact_relation3" name="contact_relation3" class="form-control" value="{{ old('contact_relation3', isset($customer) ? $customer->template->contact_relation3 : '') }}" required>
                            @if($errors->has('contact_relation3'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_relation3') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('contact_relation4') ? 'has-error' : '' }}">
                            <label for="contact_relation4">{{ trans('cruds.ekadManagement.kad_fields.contact_relation4') }}</label>
                            <input type="text" id="contact_relation4" name="contact_relation4" class="form-control" value="{{ old('contact_relation4', isset($customer) ? $customer->template->contact_relation4 : '') }}">
                            @if($errors->has('contact_relation4'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('contact_relation4') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('music_id') ? 'has-error' : '' }}">
                            <label for="music_id">{{ trans('cruds.ekadManagement.kad_fields.music_id') }}</label>
                            {{ $customer->template->music_id }}
                            {{-- <input type="text" id="music_id" name="music_id" class="form-control" value="{{ old('music_id', isset($customer) ? $customer->template->music_id : '') }}" required> --}}
                            <select name="music_id" id="music_id" class="form-control select2" required>
                                @foreach($music as $id => $music)
                                    <option value="{{ $id }}" {{ ($id == old('music_id', $customer->template->music_id)) ? 'selected' : '' }}> {{ $music->music_title }} - {{ $music->music_author }} </option>
                                @endforeach
                            </select>
                            @if($errors->has('music_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('music_id') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('googlemap_url') ? 'has-error' : '' }}">
                            <label for="googlemap_url">{{ trans('cruds.ekadManagement.kad_fields.googlemap_url') }} <span style="color:red">*</span></label>
                            <input type="text" id="googlemap_url" name="googlemap_url" class="form-control" value="{{ old('googlemap_url', isset($customer) ? $customer->template->googlemap_url : '') }}" required>
                            @if($errors->has('googlemap_url'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('googlemap_url') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('wazemap_url') ? 'has-error' : '' }}">
                            <label for="wazemap_url">{{ trans('cruds.ekadManagement.kad_fields.wazemap_url') }} <span style="color:red">*</span></label>
                            <input type="text" id="wazemap_url" name="wazemap_url" class="form-control" value="{{ old('wazemap_url', isset($customer) ? $customer->template->wazemap_url : '') }}" required>
                            @if($errors->has('wazemap_url'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('wazemap_url') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('google_calendar') ? 'has-error' : '' }}">
                            <label for="google_calendar">{{ trans('cruds.ekadManagement.kad_fields.google_calendar') }} <span style="color:red">*</span></label>
                            <input type="text" id="google_calendar" name="google_calendar" class="form-control" value="{{ old('google_calendar', isset($customer) ? $customer->template->google_calendar : '') }}" required>
                            @if($errors->has('google_calendar'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('google_calendar') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('apple_calendar') ? 'has-error' : '' }}">
                            <label for="apple_calendar">{{ trans('cruds.ekadManagement.kad_fields.apple_calendar') }} <span style="color:red">*</span></label>
                            <input type="text" id="apple_calendar" name="apple_calendar" class="form-control" value="{{ old('apple_calendar', isset($customer) ? $customer->template->apple_calendar : '') }}" required>
                            @if($errors->has('apple_calendar'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('apple_calendar') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('textUcapan') ? 'has-error' : '' }}">
                            <label for="textUcapan">{{ trans('cruds.ekadManagement.kad_fields.textUcapan') }} <span style="color:red">*</span></label>
                            <textarea id="textUcapan" name="textUcapan" class="form-control" required>
                                {{ old('textUcapan', isset($customer) ? $customer->template->textUcapan : '') }}
                            </textarea>
                            @if($errors->has('textUcapan'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('textUcapan') }}
                                </em>
                            @endif
                            {{-- <p class="helper-block">
                                {{ trans('cruds.ekadManagement.kad_fields.intro_desc_helper') }}
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('styles')
<style>
.file-input__input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  
  .file-input__label {
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    font-size: 14px;
    padding: 10px 12px;
    background-color: #4245a8;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
  }
  
  .file-input__label svg {
    height: 16px;
    margin-right: 4px;
  }
</style>
@endsection

@section('scripts')
<script type="text/javascript">
    // $(function () {
        // $('#datetimepicker1').datetimepicker();
    // });

    $('.input-group.date').datetimepicker(); 
 </script>
@endsection