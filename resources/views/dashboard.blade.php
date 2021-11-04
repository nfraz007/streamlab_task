@extends('app')

@section('content')

@include('includes.navbar')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Streams Per Game</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Total Streams</th>
                        </tr>
                        @foreach($stream_per_game as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Highest Viewers Per Game</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Highest Viewers</th>
                        </tr>
                        @foreach($highest_viewer_per_game as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Stream with Odd Viewer</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Streams</th>
                        </tr>
                        @foreach($odd_streams as $key => $value)
                        <tr>
                            <td>{{ $value->game_name }}</td>
                            <td>{{ $value->viewer_count }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Stream with Even Viewer</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Streams</th>
                        </tr>
                        @foreach($even_streams as $key => $value)
                        <tr>
                            <td>{{ $value->game_name }}</td>
                            <td>{{ $value->viewer_count }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top 100 Streams</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Streams</th>
                        </tr>
                        @foreach($top_100_streams as $key => $value)
                        <tr>
                            <td>{{ $value->game_name }}</td>
                            <td>{{ $value->viewer_count }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Median Viewer Per Game</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Viewer</th>
                        </tr>
                        @foreach($median_viewer_per_game as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Game with same stream & viewer</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Game</th>
                            <th>Streams</th>
                            <th>Viewers</th>
                        </tr>
                        @foreach($stream_same_viewer as $key => $value)
                        <tr>
                            <td>{{ $value->game_name }}</td>
                            <td>{{ $value->viewer_count }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection