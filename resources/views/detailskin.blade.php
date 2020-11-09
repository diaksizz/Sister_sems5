@extends('main')

@section('content')
<center><h1 style="margin-top: 20px; margin-bottom: 20px; color: white; font-family: sans-serif;"> LIST SKIN</h1>
</center>
<div class="container">
    <button class="btn btn-light" data-toggle="modal" data-target="#modaladd" style="margin-bottom: 20px;"><i
            class="fas fa-user">+</i></button>
    <table class="table table-hover  table-bordered">
        <thead>

        <tr class="table-warning">
            <th scope="col">#</th>
            <th scope="col">AKUN ID</th>
            <th scope="col">SKIN ID</th>
            <th scope="col">HERO ID</th>
            <th scope="col">NAMA SKIN</th>
            <th scope="col">HARGA SKIN</th>
            <th scope="col">ACTION</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($skin as $l)
            <tr class="table-success">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$l->AKUNID}}</td>
                <td>{{$l->SKINID}}</td>
                <td>{{$l->HEROID}}</td>
                <td>{{$l->SKINNAMA}}</td>
                <td>{{$l->SKINHARGA}}</td>
                <td>
                    <a class="btn btn-danger btn-sm" href="{{route('hapusskin', $l->SKINID)}}"
                       onclick="return confirm('Apakah anda yakin ingin menghapus {{$l->SKINNAMA}}  dari daftar skin ?')"><i
                            class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD SKIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="show">
                    <form method="post" action="{{route('tambahskin')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">NAMA SKIN</label>
                            <select class="form-control select2" id="SKINID" name="SKINID">
                                <option value=""> Pilih Skin</option>
                                @foreach($skins as $t)
                                    <option value="{{$t->SKINID}}" data-harga="{{$t->SKINHARGA}}">{{$t->SKINNAMA}}</option>
                                    {{--                                    <option value="{{$t->HEROID}}">{{$t->HERONAMA}}</option>--}}
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="SKINHARGA">HARGA SKIN</label>
                            <input readonly type="text" name="SKINHARGA" id="SKINHARGA" class="form-control"
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
    $('#SKINID').on('change',function(){
        var harga = $(this).children('option:selected').data('harga');
        $('#SKINHARGA').val(harga);
    });
</script>
@endsection
