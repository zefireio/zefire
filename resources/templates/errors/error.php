@extends('layout.master')

@section('content')
    <section>
      <div class="container">
        <div class="row page">
          <div class="col-lg-12">
            <h1>{{ translate('error.oups') }}</h1>
            <p>{{ translate('error.error') }} {{ $data['code'] }}: {{ $data['status'] }}</p>
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
          </div>
        </div>
      </div>
    </section>
@endsection