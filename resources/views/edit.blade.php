@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('update',[$data->id]) }}">
                        Note : <input type="text" name="note" required value="{{ $data->note }}"><br>
                        Amount : <input type="text" name="amount" required value="{{ $data->amount }}"><br>
                        Type : <select name="type" required>
                                @if($data->type=="1")
                                <option value="1" selected>รายรับ</option>
                                <option value="2">รายจ่าย</option>
                                @else
                                <option value="1">รายรับ</option>
                                <option value="2" selected>รายจ่าย</option>
                                @endif
                            </select><br>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button type="submit">Sumit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
