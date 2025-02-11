<x-layout>
   

    <div style="margin-top: 50px;">
        <form action="{{ route('konums.edit_done',  $veri->id) }}" method="POST">
            @csrf

            <div class="form-group" >
                <label for="konumAd">Konum Ad</label>
                <input type="text" class="form-control" id="konumAd" name="konumAd" aria-describedby="Konum Ad" placeholder="Konum Ad" value="{{ $veri->konumAd }}" required>
            </div>
            <div class="form-group" >
                <label for="enlem">Enlem</label>
                <input type="number" step="any" class="form-control" id="enlem" name="enlem" aria-describedby="Enlem" placeholder="Enlem" value="{{ $veri->enlem }}" required>
            </div>
            <div class="form-group" >
                <label for="boylam">Boylam</label>
                <input type="number" step="any" class="form-control" id="boylam" name="boylam" aria-describedby="Boylam" placeholder="Boylam" value="{{ $veri->boylam }}" required>
            </div>
            <div class="form-group" >
                <label for="renk">Renk</label>
                <input type="text" class="form-control" id="renk" name="renk" aria-describedby="Renk" placeholder="#0000" value="{{ $veri->renk }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Düzelt</button>
            <br><br>
            @if ($errors->any())
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif

        </form>
    </div>
</x-layout>