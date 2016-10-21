@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-4 col-sm-4 col-xs-4 text-left">
                <h2>{{ trans('event.list_event') }}</h2>
              </div>
            </div>
          </div>
          <div class="margin-top-20">
            @include('partial.success')
            @include('partial.error')
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="x_content">
          <table class="common-datatable table table-striped table-bordered">
            <thead>
              <tr>
                <th class="text-center">{{ trans('event.attributes.id') }}</th>
                <th class="text-center">{{ trans('event.attributes.name') }}</th>
                <th class="text-center">{{ trans('event.attributes.categoory') }}</th>
                <th class="text-center">{{ trans('event.attributes.place') }}</th>
                <th class="text-center">{{ trans('event.attributes.from_time') }}</th>
                <th class="text-center">{{ trans('event.attributes.to_time') }}</th>
                <th class="text-center">{{ trans('event.attributes.description') }}</th>
                <th class="no-link last action text-center">
                  <span class="nobr">{{ trans('common.attributes.action') }}</span>
                </th>
              </tr>
            </thead>
              <tbody>
                @foreach ($events as $key => $event)
                <tr class="pointer">
                  <td>{{ Html::linkAction('Admin\EventController@show', $event->id, $event->id) }}</td>
                  <td>{{ $event->id }}</td>
                  <td>{{ $event->name }}</td>
                  <td>{{ $event->category }}</td>
                  <td>{{ $event->place }}</td>
                  <td>{{ $event->from_time }}</td>
                  <td>{{ $event->to_time }}</td>
                  <td>{{ $event->descriptin }}</td>
                  <td class="text-center last action">
                    <table width="100%">
                      <tr>
                        <td>
                          {{ Html::linkAction(
                            'Admin\EventController@edit',
                            trans('common.button.edit'),
                            $event->id,
                            ['class' => 'btn btn-primary edit-delete-btn']
                          ) }}
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
@endsection
