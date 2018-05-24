@extends('layout.master')

@section('content')
  <div class="content">  
    <h1>{{ translate('error.title') }}</h1>
    <p>{{ $data['message'] }}</p>
    @if(\App::debugMode('app.debug') === true)
      <p>{{ translate('error.details') }}</p>
      <p>{{ translate('error.code') }}: {{ $data['code'] }}</p>
      <p>{{ translate('error.file') }}: {{ $data['file'] }}</p>
      <p>{{ translate('error.line') }}: {{ $data['line'] }}</p>
      <h4>{{ translate('error.trace') }}</h4>
      <table class="table table-bordered">
        <thead>
          <th align="left">{{ translate('error.file') }}</th><th align="left">{{ translate('error.line') }}</th><th align="left">{{ translate('error.class') }}</th><th align="left">{{ translate('error.function') }}</th>
        </thead>
        <tbody>
          @foreach($data['trace'] as $key => $value)
            <tr>
              @if(isset($value['file']))
                  <td>{{ $value['file'] }}</td>                            
              @else
                  <td>...</td>
              @endif
              @if(isset($value['line']))
                  <td>{{ $value['line'] }}</td>                            
              @else
                  <td>...</td>
              @endif
              @if(isset($value['class']))
                  <td>{{ $value['class'] }}</td>                            
              @else
                  <td>...</td>
              @endif
              @if(isset($value['function']))
                  <td>{{ $value['function'] }}</td>                            
              @else
                  <td>...</td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection