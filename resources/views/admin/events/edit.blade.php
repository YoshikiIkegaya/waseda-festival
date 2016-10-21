@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel item-container">
        <div class="item-info">
          <h2>{{ trans('item.update_item') }}</h2>
          {!! Form::open([
            'method' => 'PUT',
            'action' => ['Repairer\ItemController@update', $item->id],
            'class' => 'form-horizontal',
          ]) !!}
          {{ Form::hidden('status', $item->status) }}
          <div class="row item-detail">
          @foreach (config('common.item.detail_repairer') as $value)
            @if (in_array($value, config('common.item.repairer_fillable')))
              <div class="col-md-4 col-sm-6 col-xs-12">
                @if ($item[$value])
                  <div class="col-md-4 col-sm-4 col-xs-4 form-group item-title title-orange">
                    <label>{{ trans($itemLangPath.$value) }}</label>
                  </div>
                @else
                  <div class="col-md-4 col-sm-4 col-xs-4 form-group item-title title-gray">
                    <label>{{ trans($itemLangPath.$value) }}</label>
                  </div>
                @endif
                <div class="col-md-8 col-sm-8 col-xs-8 form-group item-value">
                  {{ Form::text(
                    $value, $item[$value], [
                      'class' => 'form-control',
                      'placeholder' => trans($itemLangPath.$value)
                    ]
                  ) }}
                </div>
              </div>
            @else
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="col-md-4 col-sm-4 col-xs-4 form-group item-title">
                  <label>{{ trans($itemLangPath.$value) }}</label>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 form-group item-value">
                  <input type="text" name="{{ $value }}" value="{{ $item[$value] }}" class="form-control" readonly>
                </div>
              </div>
            @endif
          @endforeach
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-title">
                <label>{{ trans($itemLangPath.'pi_contact') }}</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-value">
                <textarea name="pi_contact" class="form-control" cols="50" rows="5" readonly>{{ $item->pi_contact }}</textarea>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              @if ($item[$value])
                <div class="col-md-12 col-sm-12 col-xs-12 form-group item-title title-orange">
                  <label>{{ trans($itemLangPath.'remarks') }}</label>
                </div>
              @else
                <div class="col-md-12 col-sm-12 col-xs-12 form-group item-title title-gray">
                  <label>{{ trans($itemLangPath.'remarks') }}</label>
                </div>
              @endif
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-value">
                {{ Form::textarea(
                  'remarks', $item->remarks, [
                    'class' => 'form-control',
                    'rows' => 5,
                    'cols' => 50,
                    'placeholder' => trans($itemLangPath . 'remarks')
                  ]
                ) }}
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group text-center">
            {{ Html::link(URL::previous(), 
              trans('common.button.cancel'),
              ['class' => 'btn btn-default edit-delete-btn']
            ) }}
            {{ Form::button(
              trans('common.button.update'),
              ['type' => 'submit', 'class' => 'btn btn-success']
            )}}
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
