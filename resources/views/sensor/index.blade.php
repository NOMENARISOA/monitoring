@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Liste Sensor</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd"> Nouveau Sensore</button>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Adresse MAC</th>
        <th scope="col">Gateway</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sensors as $sensor)
            <tr>
                <td>{{ $sensor->name }}</td>
                <td>{{ $sensor->mac }}</td>
                <td>{{ $sensor->gateway->name }}</td>
                <td></td>
            </tr>
        @endforeach

    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('sensor.store') }}" method="POST" >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nom Gateway</label>
                        <input type="text" class="form-control" id="name" name ="name" >
                    </div>
                    <div class="form-group">
                        <label for="mac">Adresse MAC sans (:)</label>
                        <input type="text" class="form-control" id="mac" name="mac" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="gateway_id">Example select</label>
                    <select class="form-control" id="gateway_id" name="gateway_id">
                      @foreach ($gateways as $gateway )
                        <option value="{{ $gateway->id }}"> {{ $gateway->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
  </div>

@endsection
