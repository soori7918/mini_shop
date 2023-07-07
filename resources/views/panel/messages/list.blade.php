@if (count($errors) > 0)
    @push('scripts')
        <script type="text/javascript">
            $.jGrowl('<ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>', {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    @endpush
@endif
@if(Session::has('flash_message'))
    @push('scripts')
        <script type="text/javascript">
            $.jGrowl('{!! session("flash_message") !!}', {life: 3000, position: 'bottom-right', theme: 'bg-success'});
        </script>
    @endpush
@endif
@if(Session::has('err_message'))
    @push('scripts')
        <script type="text/javascript">
            $.jGrowl('{!! session("err_message") !!}', {life: 3000, position: 'bottom-right', theme: 'bg-danger'});
        </script>
    @endpush
@endif