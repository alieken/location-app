<x-layout>
    <style>
        table{
            background: white;
        }
        .top-div{
            margin-top: 50px;
        }
    </style>
    <div class="table-responsive top-div">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Konum Ad</th>
                <th scope="col">Enlem</th>
                <th scope="col">Boylam</th>
                <th scope="col">Renk</th>
                <th scope="col">Konum</th>
                <th scope="col">Düzelt</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $table as $row )
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->konumAd }}</td>
                        <td>{{ $row->enlem }}</td>
                        <td>{{ $row->boylam }}</td>
                        <td style="background-color: #{{ $row->renk }};"></td>
                        <td><a href="{{ route('konums.konum', $row->id) }}" class="btn btn-primary">Konum</a></td>
                        <td><a href="{{ route('konums.edit', $row->id) }}" class="btn btn-warning">Düzenle</a></td>
                        <td>
                            <form action="{{ route('konums.delete', $row->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-layout>