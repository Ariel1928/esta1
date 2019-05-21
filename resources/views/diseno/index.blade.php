@extends('diseno.layout')

@section('content')

<H1 class="text-center"> &copy; ariel</H1>
<div class="container">

    
<a class="btn btn-primary" href="{{route('diseno.create')}}">Asignar proyecto</a>
<a class="btn btn-primary mb-3 float-right" href="">Imprimir</a>

@if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre del proyecto</th>
      <th scope="col">Actividad</th>
      <th scope="col">inicio del proyecto</th>
      <th scope="col">Fin del proyecto</th>
      <th scope="col">Tiempo estimado de la actividad</th>
      <th scope='col'>Fecha</th>
      <th scope='col'>Terminado</th>
      <th scope='col'>Comentarios</th>
      <th scope='col'>Acciones</th>
      

    </tr>
  </thead>
  <tbody>
  @foreach($waters as $water)
    <tr>
      <th scope="row">{{ $water->id }}</th>
      <td>{{ $water->nombre }}</td>
      <td>{{ $water->actividad }}</td>
      <td>{{ $water->inicio }}</td>
      <td>{{ $water->fin }}</td>
      <td>{{ $water->tiempo }}</td>
      <td>{{ $water->fecha }}</td>
      <td>{{ $water->terminado }}</td>
      <td>{{ $water->comentarios }}</td>

  
      <td><a class="btn-sm btn-info botoninput" href="{{ route('diseno.edit', $water->id) }}"><i class="far fa-edit"></i></a>

         <form action="route('diseno.destroy' , $water->id)" method="POST">
                    @csrf
                    @method('DELETE')
      
          <button type="submit" class="btn-sm btn-danger mt-3" onclick="return confirm('Quiere borrar el registro?')" ><i class="far fa-trash-alt"></i></button>

        </form>
       
       
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$waters->links()}}
</div>



@endsection 