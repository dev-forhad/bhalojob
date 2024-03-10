<div class="modal-body">
    <div class="form-body">

        @php
            $years = DB::table('years')->get();
            $degreelist = App\DegreeLevel::orderBy('id', 'asc')->get();
        @endphp
        <div class="row justify-content-center">
            <div class="form-group col-md-12">
            <div class="formrow text-center" id="div_language_id">
                <label for="degree_level_id" class="bold mb-2">Degree Level</label>
                
                <div>
                    @foreach($degreelist as $degree)
                        <a data-id="{{$degree->id}}" data-name="{{$degree->degree_level}}" class="d-block mb-4 text center selectdegree">{{$degree->degree_level}}</a>
                        
                    @endforeach
                </div>
                
            </div>

        

        </div>


    </div>
</div>

 

