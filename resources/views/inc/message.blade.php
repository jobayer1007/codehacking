{{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif --}}

    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach        
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>       
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>       
    @endif