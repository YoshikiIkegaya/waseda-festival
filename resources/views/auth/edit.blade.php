@extends('layouts.master')

@section('content')
  <span class="section">
    {{ trans('admin.user.attributes.edit_user') }}
  </span>

  @include('partial.error')
  @include('partial.success')
  {!! Form::open([
    'method' => 'PUT',
    'action' => ['Auth\ProfileController@update'],
    'class' => 'form-horizontal',
  ]) !!}

    @include('_form.text', [
      'name' => 'name',
      'value' => $profile->name,
      'required' => 'required'
    ])

    @include('_form.password', [
      'name' => 'password',
    ])

    @include('_form.password', [
      'name' => 'password_confirmation',
    ])

    @include('_form.textarea', [
      'name' => 'remarks',
      'value' => $profile->remarks,
      'rows' => '6'
    ])

    <div class="ln_solid"></div>

    <div class="form-group">
      <div class="col-md-6 col-md-offset-3">
        {{ Form::button(
          trans('common.button.update'),
          ['type' => 'submit', 'class' => 'btn btn-success']
        )}}
      </div>
    </div>
  {{ Form::close() }}

@endsection
