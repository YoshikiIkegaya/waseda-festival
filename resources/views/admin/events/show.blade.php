@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel item-container">
        <div class="x_title">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 text-left">
              <h2>{{ trans('item.item_info') }}</h2>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-8 text-right item-edit-btn">
              {{ Html::linkAction(
                'Repairer\ItemController@index',
                trans('common.button.back'),
                $searchData,
                ['class' => 'btn btn-default edit-delete-btn']
              ) }}
              {!! gen_link_action_glyphicon(
                'Repairer\ItemController@edit', $item->id,
                'glyphicon glyphicon-edit',
                'btn btn-primary',
                trans('common.button.edit')
              ) !!}
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="margin-top-20">
          @include('partial.success')
          @include('partial.error')
        </div>
        <div class="item-relate-info">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <span>{{ trans($itemLangPath . 'status') }}: </span>
            <strong>{{ trans('item.status.' . $item->status) }}</strong>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="item-info">
          <h2>{{ trans('item.item_detail') }}</h2>
          <div class="row item-detail">
            @foreach (config('common.item.detail_repairer') as $value)
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="col-md-4 col-sm-4 col-xs-4 form-group item-title title-gray">
                  <label>{{ trans($itemLangPath . $value) }}</label>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 form-group item-value">
                  <input type="text" name="{{ $value }}" value="{{ array_get($item, $value) }}" class="form-control" readonly>
                </div>
              </div>
            @endforeach
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12 col-sm-12 col-x-12 form-group item-title title-gray">
                <label>{{ trans($itemLangPath . 'pi_contact') }}</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-value">
                <textarea name="pi_contact" class="form-control" cols="50" rows="5" readonly>{{$item->pi_contact}}</textarea>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-title title-gray">
                <label>{{ trans($itemLangPath . 'remarks') }}</label>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group item-value">
                <textarea name="remarks" class="form-control" cols="50" rows="5" readonly>{{$item->remarks}}</textarea>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
