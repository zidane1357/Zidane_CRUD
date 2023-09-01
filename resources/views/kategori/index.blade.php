@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Table Category</h4>
                        <a href="{{ route('kategori.create') }}" class="btn btn-success">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategori as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->dkr }}</td>
                                            <td>
                                                <form action="{{ route('kategori.destroy', $item->id) }}"
                                                    class="d-flex gap-3" method="POST">
                                                    @csrf
                                                    <a href="{{ route('kategori.show', $item->id) }}"
                                                        class="btn btn-info">Show</a>
                                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                                        class="btn btn-secondary">Edit</a>
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Data Belum Ada</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
