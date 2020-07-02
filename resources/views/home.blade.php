@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('add') }}">
                        @csrf
                        Note : <input type="text" name="note" required><br>
                        Amount : <input type="text" name="amount" required><br>
                        Type : <select name="type" required>
                                <option value="1">รายรับ</option>
                                <option value="2">รายจ่าย</option>
                            </select><br>
                        <button type="submit">Sumit</button>
                        </form>
                    @php
                     {{ $amount = 0.0; }}
                    @endphp
                    @foreach($data As $key => $value)
                    <div>
                        <p>Note : {{ $value->note }}</p>
                        @if($value->type==1)
                            <p>Amount : +{{ $value->amount }} ฿</p>
                            @php
                                {{ $amount = $amount+$value->amount; }}
                            @endphp
                        @else
                            <p>Amount : -{{ $value->amount }} ฿</p>
                            @php
                                {{ $amount = $amount-$value->amount; }}
                            @endphp
                        @endif
                        <a href="{{ route('del', [$value->id]) }}">ลบ</a>
                        <a href="{{ route('view_edit', [$value->id]) }}">แก้ไข</a>
                    </div><hr>
                    @endforeach
                    Amount All : {{ $amount }} ฿
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
