@if (session('errors'))
    <script>
        var errorMessage = '';
        @foreach (session('errors')->all() as $error)
            errorMessage += "{{ $error }}" + '<br>';
        @endforeach
        Swal.fire('Error', errorMessage, 'error', );
    </script>
@endif
@if (session('message'))
    <script>
        Swal.fire('Success!', "{!! session('message') !!}", 'success');
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire('Permission Denied!', "{!! session('error') !!}", 'warning');
    </script>
@endif
