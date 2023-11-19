@if ( Session::has('success') )
@php
    $message = Session::get('success');
    echo "<script>sessionStorage.setItem('success', `{$message}`)</script>";
@endphp
@endif
