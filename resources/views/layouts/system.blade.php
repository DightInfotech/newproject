<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LIG PDF</title>
    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/nucleo-outline.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/jquery.fs.stepper.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/semantic.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/remodal-default-theme.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/remodal.css')}}" rel="stylesheet">
    <link href="{{URL::asset('redactor/redactor.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/dropzone.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/multi-select.css')}}" rel="stylesheet">
    <!-- added by SS -->
    <link href="{{URL::asset('css/croppieCropImg.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/styleCropImg.css')}}" rel="stylesheet">
    <!-- end -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <![endif]-->
    @stack('style')
</head>
<body>
<!-- ########## START: LEFT PANEL ########## -->
<div class="left-sidebar c-menu--slide-left">
    <div class="logo-box">
        <h1><a href="{{url('/')}}"><img src="{{asset('images/lig.png')}}" /> </a></h1>
    </div>
    <div class="nav-menu">
        <ul>
            @if(Auth()->user()->roles()->first()->name == 'Admin')
                <li {{{(Request::is('admin/dashboard') ? 'class=active' : '')}}}><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li {{{ (Request::is('admin/users*') ? 'class=active' : '') }}}><a href="{{ route('users.index') }}">Users</a></li>
                <li {{{ (Request::is('admin/memorandums*') ? 'class=active' : '') }}}><a href="{{ route('memorandums.index') }}">Memorandum</a></li>
                <li><a href="#">Report an issue</a></li>
            @endif
            <li><a href="{{route('memo.files')}}">Files</a></li>

        </ul>
    </div>
    <p class="jobotron-v-5-01-a-pro">Le Investment Group a product by bma.<br/>All rights reserved.</p>
</div>
<!-- ########## END: LEFT PANEL ########## -->
<!-- ########## START: TOP PANEL ########## -->
<div class="admin-header top-bg header-top clearfix navbar-static-top" id="header">
    <div class="header-nav">
        <ul class="nav navbar-top-links navbar-right pull-right active">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false"> <strong>{{ Auth()->user()->user_name }}</strong><span class="caret-bottom"></span> <span class="user-img"><img src="{{ (Auth()->user()->image) ? Storage::url('avatar/'.Auth()->user()->avatar) :  asset('images/images.png') }}" alt="user-img"  width="45"></span></a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('users.edit', Auth()->user()->id) }}">Edit profile</a></li>
                    <li><a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
</div>
<!-- ########## END: TOP PANEL ########## -->
<!-- ########## START: WRAPPER ########## -->
<div id="wrapper" class="wrapper">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<!-- ########## END: WRAPPER ########## -->
<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    {{csrf_field()}}
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/jquery-ui.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-select.js')}}"></script>
<script src="{{URL::asset('js/jquery.fs.stepper.js')}}"></script>
<script src="{{URL::asset('js/semantic.min.js')}}"></script>

<script src="{{URL::asset('js/imask.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="{{URL::asset('js/remodal.js')}}"></script>
<script src="{{URL::asset('js/jquery.tablesorter.js')}}"></script>
<script src="{{URL::asset('js/script.js')}}"></script>
<script src="{{URL::asset('js/dropzone.js')}}"></script>
<script src="{{URL::asset('js/jquery.multi-select.js')}}"></script>

<script src="{{URL::asset('redactor/redactor.min.js')}}"></script>
<script src="{{URL::asset('redactor/plugins/alignment/alignment.js')}}"></script>
<script src="{{URL::asset('redactor/plugins/source/source.js')}}"></script>
<!-- added by SS -->
<script src="{{URL::asset('js/croppieCropImg.js')}}"></script>
<script src="{{URL::asset('js/uploadCropImg.js')}}"></script>
<!-- end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
@yield('jsScript')
<script>
$(function()
{
    $R('.js-wysiwyg', {
        minHeight: '400px',
        imageUpload: '{{url('editor/image/upload')}}',
        imageResizable: true,
        imagePosition: true,
        plugins: ['alignment']
    });
});
</script>
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {

                $('#img').attr('src', e.target.result);

                $('#img').css("display","block");

            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function confirmDelete()
    {
        var r = confirm("Are you sure you want to perform this action?");
        if (r === true)
        {
            return true;

        }
        else{
            return false;
        }
    }

    function openModal(button, data_id){
        event.preventDefault();
        //store image name in hidden input name same as button_id like select-image-1
        var button_id = button.id;
        $('#m_modal_4').modal('show');
        $('#m_modal_4').modal({backdrop: 'static', keyboard: false});
        $('#m_modal_4').css('top', 0);
        $("#tmp1").val(data_id);
    }

    function check(value){
        var tmp = $("#tmp1").val();
        if ($('#res_' + value).hasClass('added-slide')) {
            $('#res_' + value).removeClass('added-slide');
            $("#hidden-field-" + tmp).val('');
        } else {
            $('.added-slide').each(function () {
                $(this).removeClass('added-slide');
            });
            $('#res_' + value).addClass('added-slide');
            var token = $('meta[name=csrf-token]').attr("content");
            var asset_id = $('#res_' + value).data('id');
            $.ajax({
                url: '{{ route('assets.get') }}',
                type: 'POST',
                data: {_token: token, asset_id: asset_id},
                dataType: 'JSON',
                success: function (data) {
                    if (data) {
                        console.log(data);
                        $("#hidden-field-" + tmp).val(data.data['file']);
                        var image = '{{Storage::disk('s3')->url('assets/')}}' + data.data['file'];
                        $("#img-" + tmp).attr('src', image);
                        $("#img-" + tmp).css('display', 'block');
                        $('#res_' + value).removeClass('added-slide');
                        $("#m_modal_4").modal('hide');
                    }
                }
            });
        }
    }
    $('#modalClose').click(function () {
        $('#m_modal_4').modal('hide');
    });
</script>
@stack('js')
</body>
</html>