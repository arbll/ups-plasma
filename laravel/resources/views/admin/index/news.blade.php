@extends('layouts.default')

@section('js')
<script src="/js/tinymce/tinymce.min.js"></script>
<script src="/js/admin/page.js"></script>
@stop

@section('content')
<section class="content-section container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <h1 class="page-header">Gestion des news</h1>
      <br>
      <table class="table">
        <thead>
          <th>#</th>
          <th>Titre</th>
          <th>Auteur</th>
          <th>Catégorie</th>
          <th>Dernière édition</th>
          <th>Actions</th>
        </thead>
        @foreach($news as $n)
        <tr>
          <th class="vertical-align-middle" scope="row">{{ $n->id }}</th>

          <td class="vertical-align-middle">{{ shortify($n->title, 35) }}</td>
          <td class="vertical-align-middle">{{ $n->author->first_name . ' ' . ucwords($n->author->last_name[0]) . '.' }}</td>
          <td class="vertical-align-middle">{{ $n->categories->first()->title }}</td>
          <td class="vertical-align-middle">{{ $n->updated_at }}</td>
          <td>
            <a class="btn btn-success" href="/news/{{ $n->id . '-' . ucwords($n->title) }}"><i class="fa fa-eye"></i></a>
            <a class="btn btn-primary" href="/admin/news/edit/{{ $n->id }}"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-danger" href="/admin/news/destroy/{{ $n->id }}"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>

</section>
@stop
