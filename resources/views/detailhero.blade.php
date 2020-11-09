@extends('main')

@section('content')
<center><h1 style="margin-top: 2%; margin-bottom: 2%;  color: white; font-family: sans-serif;"> LIST HERO</h1>
</center>
<div class="container">

    <button class="btn btn-light" data-toggle="modal" data-target="#modaladd" style="margin-bottom: 20px;"><i
            class="fas fa-user">+</i></button>

    <table class="table table-hover table-bordered">
        <thead>
        <tr class="table-warning">
            <th scope="col">#</th>
            <th scope="col">AKUN ID</th>
            <th scope="col">HERO ID</th>
            <th scope="col">NAMA HERO</th>
            <th scope="col">HARGA HERO</th>
            <th scope="col">ACTION</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($hero as $l)
            <tr class="table-primary">
                <th scope="row">{{ $loop->iteration }}</th>
                <td id="idkuh">{{$l->AKUNID}}</td>
                <td>{{$l->HEROID}}</td>
                <td>{{$l->HERONAMA}}</td>
                <td>{{$l->HEROHARGA}}</td>
                <td>
                    <a class="btn btn-danger btn-sm" href="{{route('hapushero', $l->HEROID)}}"
                       onclick="return confirm('Apakah anda yakin ingin menghapus {{$l->HERONAMA}}  dari daftar hero ?')"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--    modal--}}
    <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD HERO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="show">
                    <form method="post" action="{{route('tambahhero')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">NAMA HERO</label>
                            <select class="form-control select2" id="HEROID" name="HEROID">
                                <option value=""> Pilih Hero</option>
                                @foreach($heroes as $t)
                                    <option value="{{$t->HEROID}}" data-harga="{{$t->HEROHARGA}}">{{$t->HERONAMA}}</option>
{{--                                    <option value="{{$t->HEROID}}">{{$t->HERONAMA}}</option>--}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="HEROHARGA">HARGA HERO</label>
                            <input readonly type="text" name="HEROHARGA" id="HEROHARGA" class="form-control"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="AKUNID">ID</label>
{{--                            @foreach ($aknid as $l)--}}
                            <input readonly type="text"  value="{{$aknid['AKUNID']}}"  name="AKUNID" id="AKUNID" class="form-control"
                                   autocomplete="off" required>
{{--                                @endforeach--}}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $('#HEROID').on('change',function(){
        var harga = $(this).children('option:selected').data('harga');
        $('#HEROHARGA').val(harga);
    });
</script>
{{--<script>--}}
{{--    $("#idkuh").keyup(function() {--}}
{{--        var idkuh = $("#idkuh").val();--}}
{{--        idkuh = idkuh.toLowerCase();--}}
{{--        idkuh = idkuh.replace(/[^a-zA-Z0-9]+/g, '-');--}}
{{--        $("#AKUNID").val(idkuh);--}}
{{--    });--}}
{{--</script>--}}
    @endsection
