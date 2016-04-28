@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-3 col-md-offset-1">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Filter by Platform</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($platforms as $platform)
                        <li><a href="filter?q=<?= $platform['attributes']['platform_id']; ?>"><img src="assets/img/platforms/<?= $platform['attributes']['platform_id']; ?>/16x16.png" /> <?= $platform['attributes']['platform_neat']; ?></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-4">
            {{ Form::open(array('url' => 'search', 'method' => 'get')) }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search games" name="q">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($resultType != 'Duplicate')
                        <?= $resultType; ?> results for <?= $q; ?>
                    @else
                        Duplicate entries
                    @endif
                </div>
                <div class="panel-body">
                    @if(count($games) > 1)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Platform</th>
                                <th>Date Added</th>
                                <th>Copies</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($games as $game) { ?>
                            <tr>
                                <td><?= $game->title; ?></td>
                                <td><img src="assets/img/platforms/<?= $game->platform; ?>/16x16.png" /> <?= ucfirst($game->platform); ?></td>
                                <td><?= $game->created_at; ?></td>
                                <td><?= $game->copies; ?></td>
                                <td><a href="edit/<?= $game->id;?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> | <a href="delete/<?= $game->id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                            </tr>
                            <?php }
                        ?>
                        </tbody>
                    </table>
                    @else
                        <h2>No Results</h2>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-md-offset-10">
            <a href="{{ url('/add/game') }}" class="pull-right"><button type="button" class="btn btn-primary">Add Game</button></a>
        </div>
    </div>
</div>
@endsection
